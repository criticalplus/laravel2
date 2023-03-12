<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class select extends Component{

    
    public $roles;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $roles = NULL  ){

        $this->roles = $roles;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){

        return view('components.form.select');
    }
}
