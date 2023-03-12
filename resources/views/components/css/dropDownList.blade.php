@props(['routeDestroy' => '', 'routeView' => '', 'idRoute' => ''])


    <div x-data="{dropdownMenu: false}" class="flex items-center bg-gray-100 rounded-md relative">
        <!-- Dropdown toggle button -->
        <button @click=" dropdownMenu = ! dropdownMenu" class="w-full" @click.away="dropdownMenu = false">
            <x-css.icon type="expand_more"/>
        </button>
        <!-- Dropdown list -->
        <div x-show="dropdownMenu" x-cloak class="flex z-10 p-2 absolute right-0 py-2 mt-2 bg-gray-100 rounded-md shadow-xl top-8">

            <x-css.deleteIconForm :routeDestroy="$routeDestroy" :idRoute="$idRoute" />
            
            <a href="{{route($routeView, $idRoute)}}">
                <span class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-400 hover:text-white">
                        <x-css.icon type="zoom_in"/>
                </span>
            </a>
        </div>
    </div>