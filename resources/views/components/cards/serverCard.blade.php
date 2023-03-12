@props(['ser' => ''])

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-md">
        <!-- card header -->
        <div class="px-6 py-4 bg-{{$ser->active ? 'white' : 'gray-50'}} border-b border-gray-200 font-bold uppercase">
            {{ $ser->name }}
            <div class="float-right">
                <small>{{ __('Id').': '.$ser->id }}</small>
            </div>
        </div>

        <!-- card body -->
        <div class="p-6 bg-{{$ser->active ? 'white' : 'gray-50'}} border-b border-gray-200">
            
            <div class="float-right">
                <small>{{ __('Updated').': '.$ser->updated_at }}</small><br>
                <small>{{ __('Created').': '.$ser->created_at }}</small> 
            </div>
            {{ $ser->ws_url }} <br>
            {{ $ser->ws_api }} <br>
            {{ $ser->cmVersion->name }} - {{ $ser->cmVersion->version }} - {{ $ser->cmVersion->publishing }} <br>
            
        </div>

        <!-- card footer -->
        <div class="p-6 bg-{{$ser->active ? 'white' : 'gray-50'}} border-gray-200 text-right">

            <div class="float-left">{{__('Active')}}: {{$ser->active ? __('Yes') : __('No')}}</div>

            <div class="inline-block">
                <x-css.deleteButton routeDestroy="userserver.destroy" :idRoute="$ser->id" icon=true/>                                            
            </div>

            <div class="inline-block">
                <x-css.editButton routeEdit="userserver.edit" :idRoute="$ser->id" icon=true />
            </div>
            
        </div>
    </div>
</div>     