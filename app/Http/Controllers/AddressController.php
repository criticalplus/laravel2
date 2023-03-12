<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller{

    
    public function show($id){

        return dump(Address::find($id));

    }
    

    
    public function destroy($id){

        $error = false;  

        try{
            
            $address = Address::find($id);
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
