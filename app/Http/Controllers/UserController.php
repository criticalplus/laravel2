<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserData;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paginate = PAGINATE){
        

        try{

            $users = User::with('UserData')->sortable()->paginate($paginate)->withQueryString();    

        }catch(\Throwable $e){
           dd($e);
        }

        $roles = explode(",", ROLES );

        return view('adminApp.users.list')->with('list', $users)->with('roles', $roles);
                    
    }

    /**
     * Muestra plantilla con formulario de crear usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $roles = explode(",", ROLES );

        return view('adminApp.users.edit') ->with('title', 'create')
                                        ->with('action', 'store')
                                        ->with('user', NULL )
                                        ->with('roles', $roles);

    }

    /**
     * Recibo el formulario de create() y lo guarda en DB
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        //seteamos variables
        $error = false;                
        $roles = explode(",", ROLES );
        
        //recibimos campos del formulario para las consultas
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $dni = $request->input('dni');

        //campos que voy a validar, lo declaro separado del validator para añadir las contraseñas si es necesario
        $campos =  [
            'name'              => 'required',
            'role'               =>  Rule::in( $roles ),
            'dni'               => 'regex:/[0-9]{8}-[a-z]{1}/i',
            'email'             => 'required|unique:users|max:255',
        ];

        //Si el checker esta activado recogemos nueva contraseña y validamos
        if( $request->has('checkerPassword') ){

            $floating_p = $request->input('floating_password');
            //Si no mando el correo valido los campos de contraseña
            $campos += ['floating_password' => 'required',
                        'repeat_password'   => 'required|same:floating_password'];

        }

        //Set del validador le pasamos la variable con los campos modificados en caso de que nos llegue la pass
        $validator = Validator::make($request->all(), $campos);

        //Si no superamos la validación volvemos al formulario con mensaje de error flash
        if( $validator->stopOnFirstFailure()->fails() ){

            $error = true;
            session()->flash('flash', 'errorStore');
            return redirect()->route('users.create')->withErrors($validator)->withInput();

        }

        //Si el check no esta activado envio correo
        if( !$request->has('checkerPassword') ){

            //genero un numero aleatorio y su hash
            $pass = rand(111111, 999999);
            $floating_p = Hash::make($pass);    
            
            //Envio email con contraseña generada
            $mail = new MailController;
            $to_name = $name; 
            $to_email = $email; 
            $subject = __('New account acces'); 
            $dataTemplate = array(
                                'name'=>$name, 
                                'pass' => $pass
                            );
            $senderMail = env('MAIL_USERNAME');
            $mail->sendMail( $to_name, $to_email, $subject, $dataTemplate, $senderMail, 'register' );

        }

        //Si superamos la validación hacemos las insercciones
        try{ 
            //insertGetId(...) nos devuelve la id de la fila insertada
            $id = DB::table('users')->insertGetId([    
                'name' => $name,
                'email' => $email,
                'password' => $floating_p,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                "deleted_at" => NULL,
        
            ]);
        
        }catch(\Throwable $e){
            dd( $request );
            $error = true;
        }

        try{
            $sql = DB::table('users_data')->insert([
                'user_id' => $id,
                'role' => $role,
                'dni' => $dni,
            ]);
        
        }catch(\Throwable $e){
            //dd($e);
            $error = true;
        }

        //Si no hay error en las consultas nos dirigimos a la lista de usuarios con notificación flash, sino de vuelta al formulario con error flash
        if( $error ){
            session()->flash('flash', 'errorStore');
            return redirect()->route('users.create');
        }else{
            session()->flash('flash', 'insert');
            return redirect()->route('users.index');
        }
        

    }

    /**
     * Ver datos usuario por ID
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $user = User::with(['UserData:user_id,role,firstname,lastname,birthday,newsletter,dni,notes', 
                            'support', 
                            'address'  => function($query){
                                $query->with('city', 'state', 'country');
                            },
                            'UserServer' => function($query){
                                $query->with('cmVersion');
                            },
                            ])
                        ->find($id);

        $roles = explode(",", ROLES );
        return view('adminApp.users.profile')->with('user', $user)->with('roles', $roles);

    }

    /**
     * Muestro el formulario de editar un usuario por ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $user = DB::connection('mysql')
                    ->table('users')
                    ->leftJoin('users_data', 'users.id', '=', 'users_data.user_id')
                    ->select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.updated_at', 'users_data.role', 'users_data.dni' )
                    ->where('users.id', $id)
                    ->orderby('id','ASC')
                    ->get();
                    
                    //dd($user);
        $roles = explode(",", ROLES );
        
        return view('adminApp.users.edit') ->with('title', 'edit')
                                        ->with('action', 'update')
                                        ->with('user', $user)
                                        ->with('roles', $roles);

            //return redirect()->route('users.edit', $id);
    }

    /**
     * Recibo los datos del formulario editar usuario y lo modifico en DB
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $d='data', $id){
        //seteamos variables
        $error = false;                
        $roles = explode(",", ROLES );   
        $validator = new MyValidateController;

        //traigo el objeto usuario para comparar datos
        $user = User::with('UserData')->find($id);

        if( $d == 'data' ){

            $campos =  $validator->userEditArrayValidate( $request, $user );

        }elseif( $d == 'pass' ){

            $campos =  $validator->userEditPArrayValidate( $request, $user );                     

        }
             
        $valide = $validator->valide( $request, $campos);

        if( !$valide[0] ){
            $error = true;
            session()->flash('flash', 'errorEdit');
            return redirect()->route('users.show', $id)->withErrors($valide[1])->withInput();
        }

        //Si superamos la validación comprueba si hubo cambios en el objeto y lo guardo, sino redirigo con aviso nothing
        try{

            if( $user->isDirty() OR $user->UserData->isDirty() ){
                $user->save();
                $user->UserData->save();
            }else{
                session()->flash('flash', 'nothingEdit');
                return redirect()->route('users.show', $id);
            }     

        
        }catch(\Throwable $e){
            dd( $e );
            $error = true;
        }

        //Si no hay error en las consultas nos dirigimos a la lista de usuarios con notificación flash, sino de vuelta al formulario con error flash
        if( $error ){
            session()->flash('flash', 'errorEdit');
            return redirect()->route('users.show', $id);
        }else{
            session()->flash('flash', 'edit');
            return redirect()->route('users.show', $id);
        }

    }

    /**
     * Eliminamos un usuario por ID
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        //seteamos variables
        $error = false;  

        try{
            
            $user = User::find($id);
            $user->delete();

        }catch(\Throwable $e){
            //dd($e);
            $error = true;
        }

        //Si no hay error en las consultas nos dirigimos a la lista de usuarios con notificación flash, sino de vuelta al formulario con error flash
        if( $error ){
            session()->flash('flash', 'error');
            return redirect()->route('users.show', $id);
        }else{
            session()->flash('flash', 'delete');
            return redirect()->route('users.index');
        }

    }
}
