<x-AdminApp>
    
    <div class="p-5 bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">

    @if($action=='update')
        <form action="{{ route( 'userserver.update', $server->id ) }}" method="POST">
    @else
        <form action="{{ route( 'userserver.store' ) }}" method="POST">
            <input type="hidden" name="user_id" value="{{$user}}">
    @endif

            @csrf

            <div class="relative z-0 w-full mb-6 group">
                <x-form.input type="text" name="name" class="" label="Name" {{-- required="true" --}}>
                    {{ old('name') ?? $server->name ?? '' }}
                </x-form.input>
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <x-form.input type="text" name="ws_url" class="" label="Web Service URL" {{-- required="true" --}}>
                    {{ old('ws_url') ?? $server->ws_url ?? '' }}
                </x-form.input>
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <x-form.input type="text" name="ws_api" class="" label="Web Service API" {{-- required="true" --}}>
                    {{ old('ws_api') ?? $server->ws_api ?? '' }}
                </x-form.input>
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <x-form.input type="color" name="color" class="" label="Server color" style="width:80px;height:50px;"{{-- required="true" --}}>
                    {{ old('color') ?? $server->color ?? '' }}
                </x-form.input>
            </div>

            <div class="p-5 bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-900 dark:text-gray-400">

                <div class="input-group mr-3 w-64">
                    <x-form.selectVersion name="version" class="" label="{{__('Version')}}" :list="$versions" selectID="{{ old('version') ?? $server->CmVersion->id ?? '' }}" />
                </div>

            </div>

            <x-css.submitButton :action="$action"/>

        </form>
        
    </div>

</x-AdminApp>