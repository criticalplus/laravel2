<x-AdminApp>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

            <div class="mb-3 px-4 flex tems-end items-end justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">
                <div class="p-2 self-center">
                   Lista de usuarios
                </div>

                <div class="p-2 px-4">
                    @include('adminApp.users.forms.search', ['roles' => $roles])
                </div>

            </div>           


            <div class="p-5 bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-2 hidden md:table-cell">@sortablelink( 'id', __('ID')  )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'name', __('Name') )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'email', __('Email') )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'UserData.role', __('role') )</th>
                        <th scope="col" class="px-3 py-2 hidden lg:table-cell">@sortablelink( 'UserData.dni', __('DNI') )</th>
                        <th scope="col" class="px-3 py-2 hidden sm:table-cell">@sortablelink( 'created_at', __('Created') )</th>
                        <th scope="col" class="px-3 py-2 hidden xl:table-cell">@sortablelink( 'updated_at', __('Edited') )</th>
                        <th scope="col" class="px-1 py-2">
                            <a href="{{route('users.create')}}">
                                <x-css.icon type="add_circle_outline" />
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    @if( isset( $list[0] ) AND $list != NULL )

                        @foreach ($list as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-3 py-2 hidden md:table-cell">{{$user->id}}</td>
                                <td class="px-3 py-2">{{$user->name}}</td>
                                <td class="px-3 py-2">{{$user->email}}</td>
                                <td class="px-3 py-2"><span class="{{ strtolower($user->UserData->role) }} inline-block py-1 px-2 rounded text-neutral-600 bg-neutral-200 uppercase last:mr-0 mr-1"><small>{{ $user->UserData->role }}</small></span></td>
                                <td class="px-3 py-2 hidden lg:table-cell">{{ $user->UserData->dni }}</td>
                                <td class="px-3 py-2 hidden sm:table-cell">{{$user->created_at}}</td>
                                <td class="px-3 py-2 hidden xl:table-cell">{{$user->updated_at}}</td>
                                <td class="px-1 py-2 text-center">
                                    @if( auth()->user()->id != $user->id )
                                        <x-css.dropDownList routeDestroy="users.destroy" routeView="users.show" idRoute="{{$user->id}}" />
                                    @else
                                        <a href="{{route('users.show', $user->id)}}">
                                            <x-css.icon type="zoom_in"/>
                                        </a>
                                    @endif
                                </td>
                            </tr>  
                        @endforeach

                    @else

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="10" class="text-center">{{ __('No search result')}}</td>
                        </tr>

                    @endif
                    
                    </tbody>
              </table>


            </div>
            
            @if( isset( $list ) AND $list != NULL )
                <div class="mt-5"> {{ $list->links() }}</div>
            @endif
           
            
</x-AdminApp>
