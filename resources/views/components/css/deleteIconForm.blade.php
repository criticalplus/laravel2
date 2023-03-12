@props(['method' => 'delete', 'routeDestroy' => '', 'idRoute' => ''])


<form action="{{ route($routeDestroy, $idRoute) }}" method="POST" >
    <span class="block text-sm text-gray-700 hover:bg-gray-400 hover:text-white">
        @csrf
        @method('delete')
        <button class="px-4 py-2 w-full" type="submit"  onclick="return confirm('¿Confirmar?')"><x-css.icon type="delete"/></button>
    </span>
</form>