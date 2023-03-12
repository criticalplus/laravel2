@props(['action' => NULL, 'icon' => NULL, 'backGround' => 'blue', 'color' => 'white', 'mt' => '4', 'px' => '5' , 'py' => '2.5' ])


<button type="submit" 
        class=" mt-{{$mt}} px-{{$px}} py-{{$py}} 
                text-{{$color}} text-sm text-center 
                font-medium 
                rounded-lg 
                w-full sm:w-auto 
                @if($backGround != 'NULL') 
                bg-{{$backGround}}-700 hover:bg-{{$backGround}}-800 focus:ring-4 focus:outline-none focus:ring-{{$backGround}}-300 
                dark:bg-{{$backGround}}-600 dark:hover:bg-{{$backGround}}-700 dark:focus:ring-{{$backGround}}-800
                @endif 
                ">
    
    @if( $icon != NULL)
        <x-css.icon :type="$icon" />
    @endif

    @if( $action != NULL)
        {{  Str::upper( __( $action ) ) }}
    @endif
</button>