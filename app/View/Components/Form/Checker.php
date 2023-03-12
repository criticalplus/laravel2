<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Checker extends Component{

    public $checkName;
    public $checked;
    public $titleShow;
    public $titleHide;
    public $visibleContent;
    public $hideContent;
    public $visibility1;
    public $visibility2;
    public $class;
    public $click1;
    public $click2;
    public $width;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($checkName='', $checked='false', $titleShow='', $titleHide='',  $visibleContent ='', $hideContent='', $class='', $click1='', $click2='', $width = '1/2'){

        $this->checkName = $checkName;
        $this->checked = $checked;
        $this->titleShow = $titleShow;
        $this->titleHide = $titleHide;
        $this->visibleContent = $visibleContent;
        $this->hideContent = $hideContent;
        $this->class = $class;
        $this->click1 = $click1;
        $this->click2 = $click2;
        $this->width = $width;

        if( $checked == 'false'  OR $checked==1){

            $this->visibility1 = 'true';
            $this->visibility2 = 'false';

        }else{

            $this->visibility1 = 'false';
            $this->visibility2 = 'true';
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){

        return view('components.form.checker');
    }
}
