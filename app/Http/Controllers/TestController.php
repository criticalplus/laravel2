<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;
use PhpParser\Node\Stmt\TryCatch;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;

use App\Models\User;
use App\Models\UserData;


class TestController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        $usersData = UserData::with('User')->get();
        dd($usersData);
 

    }

    public function test1(){

        echo "send mail";
        
        try {

            $mail = new MailController;
            $to_name = 'ToName'; 
            $to_email = 'riospapapa@gmail.com'; 
            $subject = 'Test'; 
            $dataTemplate = array(
                                'name'=>'Criti Test', 
                                'body' => 'A test mail'
                            );
            $senderMail = env('MAIL_FROM_ADDRESS', 'tuspuertasaeuropa@gmail.com');
            
            $mail->sendMail( $to_name, $to_email, $subject, $dataTemplate, $senderMail );

        } catch (\Throwable $th) {
            
            throw $th;
            dd($th);

        }
        
    }

    public function test2(){



    }
    

    public function test3(){



    }







    
}
