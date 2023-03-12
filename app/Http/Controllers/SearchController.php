<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller{


    public function userSearch(Request $request){

        $roles = explode(",", ROLES);

        try{

            $user = User::where([                                               //Creo consulta where con función dentro
                [function ($query) use ($request) {                             //Voy mirando que campos están rellenos y los añado a la consulta
                    if ($request->input('id_search') != NULL) {
                        $id = $request->input('id_search');
                        $query->where('id', $id);
                    }
                    if ($request->input('name_search') != NULL) {
                        $name = $request->input('name_search');
                        $query->orWhere('name', 'like', '%'.$name.'%' );
                    }
                    if ($request->input('email_search') != NULL) {
                        $email = $request->input('email_search');
                        $query->orWhere('email', 'like', '%'.$email.'%');
                    }
                    if ($request->input('create_search') != NULL) {
                        $date1 = $request->input('create_search').' 00:00:00';
                        $date2 = $request->input('create_search').' 23:59:59';
                        $query->whereBetween('created_at', [ $date1, $date2]);
                    }
                }]
            ])
            ->with('UserData')                                                      //Añado relacion
            ->whereHas('UserData', function($query) use ($request){                 //Añado funcion en la relación
                $role=$request->input('role');
                if( $role != '0' AND $role != NULL ){
                    $query->where('role', $role );
                }
                $dni=$request->input('dni_search');
                if( $dni != NULL ){
                    $query->where('dni', 'like',  '%'.$dni.'%' );
                }
            })
            ->sortable()
            ->paginate(PAGINATE)
            ->withQueryString();
//dd($user);
        }catch (\Throwable $e){

            session()->flash('flash', 'errorSearch');
            return view('adminApp.users.list')->with('list', NULL)->with('roles', $roles);
            //dd($e);
        }

        if($request->input('id_search') == NULL AND $request->input('name_search') == NULL AND $request->input('email_search') == NULL AND $request->input('create_search') == NULL AND $request->input('role') == '0'  AND $request->input('dni_search') == NULL ) {
            $user = User::with('UserData')->sortable()->paginate(PAGINATE); 
            session()->flash('flash', 'zeroSearch');
            return view('adminApp.users.list')->with('list', $user)->with('roles', $roles);

        }

        if(empty($user)){
            session()->flash('flash', 'zeroResult');
            return view('adminApp.users.list')->with('list', NULL)->with('roles', $roles);
        }else{
            return view('adminApp.users.list')->with('list', $user)->with('roles', $roles);
        }
    }


    public function userSearch2(Request $request){

        $sqlId = [];                                                                //Creo un array para pasar al where con la id, si va vacio no da error
        $sql = [];                                                                  //Creo otro array para meter los demas campos del formulario
        $roles = explode(",", ROLES);
        $date1 = $request->input('create_search').'1789-01-01 00:00:00';            //Defino dos fechas exageradas para pasar al whereBetween() en caso de que no vengan del formulario
        $date2 = $request->input('create_search').'3000-01-01 23:59:59';
        
        if ($request->input('id_search') != NULL) {                                 //Valido cada campo y lo meto en su array
            $id = $request->input('id_search');
            array_push($sqlId,['users.id' , '=', $id] );
        }

        if ($request->input('name_search') != NULL) {
            $name = $request->input('name_search');
            array_push($sql,['users.name' , 'like', '%'.$name.'%'] ); 
        }

        if ($request->input('email_search') != NULL) {
            $email = $request->input('email_search');
            array_push($sql,['users.email' , 'like', '%'.$email.'%'] ); 
        }

        if ($request->input('role') != 'role') {
            $role = $request->input('role');
            array_push($sql,['users_data.role' , '=', $role] ); 
        }

        if ( $request->input('dni_search') != NULL) {
            $dni = $request->input('dni_search');
            array_push($sql,['users_data.dni' , 'like', '%'.$dni.'%'] ); 
        }

        if ( $request->input('create_search') != NULL) {
            $date1 = $request->input('create_search').' 00:00:00';
            $date2 = $request->input('create_search').' 23:59:59';
        }

        if( empty($sql) AND empty($sqlId) AND $request->input('create_search') == NULL){
            
            session()->flash('flash', 'zeroSearch');
            $user = User::with('UserData')->sortable()->paginate(PAGINATE); 
            return view('adminApp.users.list')->with('list', $user)->with('roles', $roles);

        }

        try{

            $users = DB::connection('mysql')->table('users')
            ->leftJoin('users_data', 'users.id', '=', 'users_data.user_id')
            ->select('users.id','users.name','users.email','users.created_at','users.updated_at', 'users_data.role', 'users_data.dni')
            ->where($sqlId)
            ->orWhere($sql)
            ->whereBetween('users.created_at', [$date1, $date2])
            //->sortable() No funciona con DB
            ->paginate(PAGINATE);
    
            //dd($result);

        }catch(\Throwable $e){
            dd($e);
        }

        if(empty($users)){

            session()->flash('flash', 'zeroResult');
            return view('adminApp.users.list')->with('list', NULL)->with('roles', $roles);

        }else{

            return view('adminApp.users.list')->with('list', $users)->with('roles', $roles);

        }
    }

    public function supportSearch(Request $request){

        //dd($request);

        $roles = explode(",", ROLES);
        
        try{

            $supports = Support::where([                                               //Creo consulta where con función dentro
                [function ($query) use ($request) {                             //Voy mirando que campos están rellenos y los añado a la consulta
                    if ($request->input('id_search') != NULL) {
                        $id = $request->input('id_search');
                        $query->where('id', $id);
                    }
                    if ($request->input('subject_search') != NULL) {
                        $subject = $request->input('subject_search');
                        $query->orWhere('subject', 'like', '%'.$subject.'%');
                    }
                    if ($request->input('level_search') != "0" ) {
                        $level = substr($request->input('level_search'), -1);
                        $query->orWhere('level', $level );
                    }
                    if ($request->input('create_search') != NULL) {
                        $date1 = $request->input('create_search').' 00:00:00';
                        $date2 = $request->input('create_search').' 23:59:59';
                        $query->whereBetween('created_at', [ $date1, $date2]);
                    }
                }]
            ])
            ->with('User')                                                      //Añado relacion
            ->whereHas('User', function($query) use ($request){                 //Añado funcion en la relación
                if ($request->input('name_search') != NULL) {
                    $name = $request->input('name_search');
                    $query->orWhere('name', 'like', '%'.$name.'%' );
                }
            })
            ->withCount([                                                                    //Contamos la cantidad de mensajes sin ver que tiene cada hilo
                'SupportComment as support_thread_count' => function ($query) use ($request) {
                    $query->where('view', 0);
                }]) 
            ->sortable()
            ->paginate(PAGINATE)
            ->withQueryString();
            
        }catch (\Throwable $e){
            
            //dd($e);

            session()->flash('flash', 'errorSearch');
            return view('adminApp.support.list')->with('list', NULL)->with('roles', $roles);
        }

        if ($request->input('read_search') == "1" ) {
            foreach( $supports as $key=>$support ){
                if( $support->support_thread_count == 0 ){
                    $supports->forget($key);
                }
            }
        }

        if($request->input('id_search') == NULL AND $request->input('subject_search') == NULL AND $request->input('level_search') == "0" AND $request->input('create_search') == NULL AND $request->input('name_search') == NULL  AND $request->input('read_search') != "1" ) {
            
            $supports = new Support;
            $supports = $supports->getSupportList( PAGINATE );
            session()->flash('flash', 'zeroSearch');
            return view('adminApp.support.list')->with('list', $supports)->with('roles', $roles);

        }

        if(empty($supports)){
            session()->flash('flash', 'zeroResult');
            return view('adminApp.support.list')->with('list', NULL)->with('roles', $roles);
        }else{
            return view('adminApp.support.list')->with('list', $supports)->with('roles', $roles);
        }



    }


}
