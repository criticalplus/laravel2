@props(['method' => 'delete', 'routeDestroy' => '', 'idRoute' => '', 'icon' => false, 'color' => 'red', 'colorStrong' => '600', 'hover' => 'red', 'hoverStrong' => '800'])


<form action="{{ route($routeDestroy, $idRoute) }}" method="POST" >
    @csrf
    @method('delete')

    <button  type="submit" class="uppercase" onclick="return confirm('¿Confirmar?')">

        <div class="flex items-center bg-{{$color}}-{{$colorStrong}} shadow-md text-sm text-white font-bold py-3 md:px-4 px-4 hover:bg-{{$hover}}-{{$hoverStrong}} rounded mr-2 ">
            @if($icon) <x-css.icon type="delete" class="mr-2"/> @endif
            {{__('Delete')}}
        </div>

    </button>

</form>