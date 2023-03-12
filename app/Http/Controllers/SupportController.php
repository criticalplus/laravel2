<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\SupportComment;
use Validator;

class SupportController extends Controller{
    

    public function index( $paginate = PAGINATE ){
        
        try{
            
            $supports = new Support;
            $supports = $supports->getSupportList( $paginate );
                                

        }catch(\Throwable $e){
            dd($e);
        }

        $roles = explode(",", ROLES );

        return view('adminApp.support.list')->with('list', $supports)->with('roles', $roles);

    }

   
    public function create(){
        //
    }

  
    public function store(Request $request){
        dd($request);
    }

    
    public function show(Support $support){

        $sup = $support->with(['supportComment' => function($query){
                                    $query->orderByDesc('updated_at');
                                }, 
                            'user:id,name,email,role,updated_at,created_at',
                            'admin:id,name,email,role'])
                            ->find($support->id);

        return view('adminApp.support.show')->with('support', $sup);

    }

    
    public function edit(Support $support){
        //
    }

    
    public function update(Request $request, Support $support){

        
        $validator = Validator::make($request->all(), [
            'threadComment' => 'required|max:28000',
            'threadFile'    => 'nullable|file',
        ]);
    
        if ($validator->fails()) {
            session()->flash('flash', 'form_error');
            return redirect()->route('support.show', $support)->with('support', $support)
                        ->withErrors($validator)
                        ->withInput();
        }
        

        $supportComment = new SupportComment();
        $supportComment->newAdminComment($support, $request);
       // dd( $supportComment );

        session()->flash('flash', 'threadSend');
        return redirect()->route('support.show', $support);

    }

  
    public function destroy(Support $support){
        //
    }
    public function destroyT(SupportComment $supportComment){

        $error = false;
        
        try{
            
            $supportComment->delete();

        }catch(\Throwable $e){
            //dd($e);
            $error = true;
        }

        //Si no hay error en las consultas nos dirigimos a la lista de usuarios con notificación flash, sino de vuelta al formulario con error flash
        if( $error ){
            session()->flash('flash', 'error');
            return redirect()->route('support.show', $supportComment->support_id );
        }else{
            session()->flash('flash', 'delete');
            return redirect()->route('support.show', $supportComment->support_id );
        }
        

    }
}
