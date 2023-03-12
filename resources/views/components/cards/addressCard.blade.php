@props(['dir' => ''])

<div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-md">
        <!-- card header -->
        <div class="px-6 py-4 bg-{{$dir->active ? 'white' : 'gray-50'}} border-b border-gray-200 font-bold uppercase">
            {{ $dir->alias }}
            <div class="float-right">
                <small>{{ __('Id').': '.$dir->id }}</small>
            </div>
        </div>

        <!-- card body -->
        <div class="p-6 bg-{{$dir->active ? 'white' : 'gray-50'}} border-b border-gray-200">
            
            <div class="float-right">
                <small>{{ __('Updated').': '.$dir->updated_at }}</small><br>
                <small>{{ __('Created').': '.$dir->created_at }}</small> 
            </div>
            {{ $dir->phone }} <br>
            {{ $dir->address }} <br>
            {{ $dir->postal_code }}, {{ $dir->city->title }} <br>
            {{ $dir->state->title }} <br>
            {{ $dir->country->title }} <br>
            
        </div>

        <!-- card footer -->
        <div class="p-6 bg-{{$dir->active ? 'white' : 'gray-50'}} border-gray-200 text-right">

            <div class="float-left">{{__('Active')}}: {{$dir->active ? __('Yes') : __('No')}}</div>

            <div class="inline-block">
                <x-css.deleteButton routeDestroy="address.destroy" :idRoute="$dir->id" icon=true/>                                            
            </div>

            <div class="inline-block">
                <x-css.editButton routeEdit="address.show" :idRoute="$dir->id" icon=true />
            </div>
            
        </div>
    </div>
</div>     