<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Support;
use App\Models\SupportComment;

class FrontPageController extends Controller{

    
    public function index(){

        $user = auth()->user();

        return view('front.web')->with('user', $user);

    }

    public function create(){
        

    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'email' => 'required|email|max:40',
            'contactMessage' => 'required|max:500',
        ]);
    
        if ($validator->fails()) {
            session()->flash('flash', 'form_error');
            return redirect('/#indexContactForm')
                        ->withErrors($validator)
                        ->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $contactMessage = $request->input('contactMessage');

        $support = new Support();

        //Null si no esta logueado
        $user = auth()->user();

        if( $user != NULL ){
            $support->user_id = $user->id;
            $name = $user->name;
        }else{
            $support->user_id = NULL;
        }
        $support->admin_id = NULL;        
        $support->subject = 'Index Contact Ticket';
        $support->level = 1;
        $support->replyName = $name;
        $support->replyMail = $email;
        
        $support->save();

        $supportComment = new SupportComment();

        $supportComment->support_id = $support->id;
        $supportComment->user_id = $support->user_id;
        $supportComment->message = $contactMessage;
        $supportComment->ip = $request->ip();
        $supportComment->mac = substr(exec('getmac'), 0, 17);

        $supportComment->save();
        

        session()->flash('flash', 'Form_send');
        return redirect('/#indexContactForm');
        
    }


    public function show($id){

        
    }


    public function edit($id){

        
    }


    public function update(Request $request, $id){

        
    }


    public function destroy($id){

        
    }
}
