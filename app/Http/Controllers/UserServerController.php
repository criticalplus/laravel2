<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserServer;
use App\Models\CmVersion;
use Illuminate\Support\Facades\Validator;

class UserServerController extends Controller{

    
    public function index(){
        
    }

    public function create($user_id){

        $versions = CmVersion::orderBy('publishing', 'DESC')->get();

        return view('adminApp.users.forms.userServerForm')
                ->with('action', 'store')
                ->with('versions', $versions)
                ->with('user', $user_id)
                ->with('server', NULL );
        
    }

    public function store(Request $request){
        
        $server = new UserServer;
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:40',
            'ws_url'    => 'required|url|max:200',
            'ws_api'    => 'required|max:200',
            'color'     => 'required|max:7',
            'version'   => 'required|not_in:0',
        ]);
    
        if ($validator->stopOnFirstFailure()->fails()) {
            session()->flash('flash', 'form_error');
            return redirect()->back()->with('server', NULL)
                        ->withErrors($validator)
                        ->withInput();
        }

        $server = $server->updateServerFields($request, $server);
        $server->user_id = $request->user_id;

        try{

            $server->save();

        }catch (\Throwable $th){
            session()->flash('flash', 'error');
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        session()->flash('flash', 'insert');
        return redirect()->back();

    }

    public function show($id){
        
        return UserServer::with('cmVersion')->find($id);

    }

    public function edit($id){
        
        $server = UserServer::with('CmVersion')->find($id);
        $versions = CmVersion::orderBy('publishing', 'DESC')->get();
        
        return view('adminApp.users.forms.userServerForm')
                ->with('action', 'update')
                ->with('versions', $versions)
                ->with('server', $server);
    }

    public function update(Request $request, $id){
        
        $server = UserServer::find($id);
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:40',
            'ws_url'    => 'required|url|max:200',
            'ws_api'    => 'required|max:200',
            'color'     => 'required|max:7',
            'version'   => 'required|not_in:0',
        ]);
    
        if ($validator->stopOnFirstFailure()->fails()) {
            session()->flash('flash', 'form_error');
            return redirect()->back()->with('server', $server)
                        ->withErrors($validator)
                        ->withInput();
        }

        $server->updateServerFields($request, $server);
        
        if( $server->isDirty() ){
            $server->save();
        }else{
            session()->flash('flash', 'nothingEdit');
            return redirect()->back();
        } 
        
        session()->flash('flash', 'edit');
        return redirect()->back();
    }

    
    public function destroy($id){
    

        $error = false;  

        try{
            
            $address = UserServer::find($id);
            $address->delete();

        }catch(\Throwable $e){
            //dd($e);
            $error = true;
        }

        if( $error ){
            session()->flash('flash', 'error');
            return redirect()->back();
        }else{
            session()->flash('flash', 'delete');
            return redirect()->back();
        }
    }
}
