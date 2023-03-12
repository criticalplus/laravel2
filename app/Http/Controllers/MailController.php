<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{

   /*       sendMail()
    *
    *  $mail = new MailController;
    *  $to_name = 'ToName'; 
    *  $to_email = 'toEmail'; 
    *  $subject = 'Test'; 
    *  $dataTemplate = array(
    *                       'name'=>'Ogbonna Vitalis(sender_name)', 
    *                       'body' => 'A test mail'
    *                   ); 
    *   $senderMail = env('MAIL_USERNAME');
    *   $mailTemplate='****' \resources\views\emails\ ****.balde.php
    */    
    public function sendMail( $to_name, $to_email, $subject, $dataTemplate, $senderMail, $mailTemplate='mail'  ){
    
        try{
            Mail::send('emails.'.$mailTemplate, $dataTemplate, function($message) use ($to_name, $to_email, $subject, $senderMail) {
            
                $message->to($to_email, $to_name)->subject( $subject );
                $message->from( $senderMail , $subject);
            });

        }catch(\Throwable $th) {
            return false;
        }

        return true;

    }





}