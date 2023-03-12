<form action="{{ route('users.search') }}" method="POST" role="search" class="flex flex-row items-end flex-wrap">


    <div class="input-group">
        
        {{ csrf_field() }}

    </div>

    <div class="input-group mr-3 w-12">
        
        <x-form.input id="id_search" type="text" name="id_search" class="" label="" placeholder="{{__('ID')}}" >
            {{ old('id_search') ?? '' }}
        </x-form.input>

    </div>

    <div class="input-group mr-3 w-36">
        
        <x-form.input id="name_search" type="text" name="name_search" class="" label="" placeholder="{{__('Name')}}" >
            {{ old('name_search') ?? '' }}
        </x-form.input>

    </div>

    <div class="input-group mr-3 w-40">
        
        <x-form.input id="email_search" type="text" name="email_search" class="" label="" placeholder="{{__('Email')}}" >
            {{ old('email_search') ?? '' }}
        </x-form.input>

    </div>

    <div class="input-group mr-3 w-28">

        <x-form.select id="rol_search" name="role" class="" label="{{__('role')}}" :list="$roles">
            {{ old('role') ?? '' }}
        </x-form.select>    

    </div>

    <div class="input-group mr-3">
        
        <x-form.input id="dni_search" type="text" name="dni_search" class="" label="" placeholder="{{__('DNI')}}" >
            {{ old('dni_search') ?? '' }}
        </x-form.input>

    </div>

    <div class="input-group mr-12">
        
        <x-form.input id="create_search" type="date" name="create_search" class="" label="" placeholder="{{__('Date')}}" >
            {{ old('create_search') ?? '' }}
        </x-form.input>

    </div>
        
    <span class="input-group-btn">
        <x-css.submitButton icon="search" backGround="NULL" color="black" mt="0" px="0" py="0" />
    </span>


</form>