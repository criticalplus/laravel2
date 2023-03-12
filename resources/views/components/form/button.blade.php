@props( ['id' => '' , 'type' => 'text', 'class' => '', 'label' => '' ,  'color' => 'gray' , 'colorWeight' => '600', 'text' => 'white',  'icon' => '' ] )

<button id="{{$id}}" type="{{$type}}" class="bg-{{$color}}-{{$colorWeight}} hover:bg-{{$color}}-900 text-{{$text}} font-bold py-2 px-4 rounded {{$class}}">
        
        {{__($label)}}

</button>