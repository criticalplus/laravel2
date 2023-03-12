@props(['routeEdit' => '', 'idRoute' => '', 'icon' => false, 'color' => 'green', 'colorStrong' => '600', 'hover' => 'green', 'hoverStrong' => '800'])


<a href="{{ route($routeEdit, $idRoute) }}">

    <div class="flex items-center bg-{{$color}}-{{$colorStrong}} shadow-md text-sm text-white font-bold py-3 md:px-4 px-4 hover:bg-{{$hover}}-{{$hoverStrong}} rounded mr-2 uppercase">
        @if($icon) <x-css.icon type="edit" class="mr-2"/> @endif
        {{__('Edit')}}
    </div>

</a>