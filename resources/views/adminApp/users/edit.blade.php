<x-AdminApp>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ( $title == 'create' )
                {{ __('New user') }}
            @elseif ( $title == 'edit'  )
                {{ __('Edit user') }}
            @endif
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- INCLUYO PLANTILLA CON FORMULARIO QUE ME INTERESA --}}
                    @if( $action == 'store' )
                        @include('adminApp.users.forms.storeUser', [ 'roles' => $roles ])
                    @elseif ( $action == 'update' )
                        @include('adminApp.users.forms.updateUser', [ 'user' => $user, 'roles' => $roles ])
                    @endif
                    {{-- <x-form.userForm :action="$action" :user="$user" :roles="$roles"/> --}}

                </div>
            </div>
        </div>
    </div>
</x-AdminApp>
