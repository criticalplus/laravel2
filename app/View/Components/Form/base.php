<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class base extends Component{

    public $action;
    public $user;
    public $roles;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $action, $user = NULL, $roles = NULL ){

        $this->action = $action;
        $this->user = $user;
        $this->roles = $roles;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){

        return view('components.form.base');
    }
}
