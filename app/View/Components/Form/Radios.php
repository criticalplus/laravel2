<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Radios extends Component{

/*  
 *  El componente necesita un array $list y dentro tantos arrays como radios con sus 4 atributos
 *   
 *  $list=[
 *        'radio1' => [
 *                'name' => 'radioCheck',
 *                'label' => 'titulo 1',
 *                'visibility' => 'true',
 *                'value' => 1,
 *            ],
 *        'radio2' => [
 *                'name' => 'radioCheck',
 *                'label' => 'titulo 2',
 *                'visibility' => 'false',
 *                'value' => 2,
 *            ],
 *   ] 
 */
    public $list;
    public $direction;
    public $click;
    public $width1;
    public $width2;


    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($list = [], $direction = 'row', $click = '',  $width1='full',  $width2='full'){

        $this->list = $list;
        $this->direction = $direction;
        $this->click = $click;
        $this->width1 = $width1;
        $this->width2 = $width2;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){

        return view('components.form.radios');
    }
}
