<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;



class MyValidateController extends Controller{

    /*
    *   Funcion para validar, recibe $request (formulario) y array con campos a validar
    *   
    *   Devuelve array con Bool (False para errores y True para validacion OK) y objeto validator
    */
    public function valide( $request, $campos  ){    

        $validator = Validator::make($request->all(), $campos);

        if( $validator->stopOnFirstFailure()->fails() ){

            return [false,$validator];

        }else{

            return [true,$validator];

        }

    }


    
    public function userEditArrayValidate( $request, $user ){  
        
        $campos = [];
        $roles = explode(",", ROLES );   

        //recibimos campos del formulario para las consultas
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $dni = $request->input('dni');
        $notes = $request->input('notes');
        if($request->has('checkerNewsletter')){
            $newsletter = 1;
        }else{
            $newsletter = 0;
        }        

        //Comparo campos para saber cual ha cambiado
        if( $user->name != $name ){
            $user->name = $name;
            $campos += ['name' => 'required|max:255'];
        }
        if( $user->email != $email ){
            $user->email = $email;
            $campos += ['email' => 'required|email|unique:users|max:255'];
        }
        if( $user->UserData->firstname != $firstname ){
            $user->UserData->firstname = $firstname;
            $campos += ['firstname' => 'max:255'];
        }
        if( $user->UserData->lastname != $lastname ){
            $user->UserData->lastname = $lastname;
            $campos += ['lastname' => 'max:255'];
        }
        if( $user->UserData->role != $role ){
            $user->UserData->role = $role;
            $campos += ['role' =>  Rule::in( $roles )];
        }
        if( $user->UserData->dni != $dni ){
            $user->UserData->dni = $dni;
            $campos += ['dni' => 'regex:/[0-9]{8}-[a-z]{1}/i'];
        }
        if( $user->UserData->notes != $notes ){
            $user->UserData->notes = $notes;
            $campos += ['notes' => 'max:65535'];
        }
        if( $user->UserData->newsletter != $newsletter ){
            $user->UserData->newsletter = $newsletter;
            $campos += ['newsletter' => 'boolean'];
        }
        
        return $campos;
    }

    
    public function userEditPArrayValidate( $request, $user ){  

        $radioCheck = $request->input('radioCheck');
        if( $radioCheck == 1){

            $radioCheck2 = $request->input('radioCheck2');

            $campos =  [];            

            //Si el check no esta activado envio correo
            if( $radioCheck2 == 0 ){
    
                //genero un numero aleatorio y su hash
                $pass = rand(111111, 999999);
                $floating_p = Hash::make($pass);
                $user->password =  $floating_p;
                
                //Envio email con contraseña generada
                $mail = new MailController;
                $dataTemplate = array(
                                    'name'=>$user->name, 
                                    'pass' => $pass
                                );
                $result = $mail->sendMail( $user->name, $user->email, __('Modified account'), $dataTemplate, env('MAIL_USERNAME'), 'update' );
    
                if( !$result ){
                    session()->flash('flash', 'emailSendError');
                    return redirect()->route('users.show', $user->id);
                }       
    
            }else{
                $pass = $request->input('floating_password');
                $floating_p = Hash::make($pass);
                $user->password =  $floating_p;
                //Si no mando el correo valido los campos de contraseña
                $campos += ['floating_password' => 'required|min:8',
                            'repeat_password'   => 'required|same:floating_password'];
            }
        }
        return $campos;

    }



}