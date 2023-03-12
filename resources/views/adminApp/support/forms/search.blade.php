<form action="{{ route('support.search') }}" method="POST" role="search" class="flex flex-row items-end flex-wrap">


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
        
        <x-form.input id="subject_search" type="text" name="subject_search" class="" label="" placeholder="{{__('Subject')}}" >
            {{ old('subject_search') ?? '' }}
        </x-form.input>

    </div>

    <div class="input-group mr-3 w-40">

        <x-form.checker checkName="read_search" checked="{{ old('read_search') ?? '' }}" width="full" titleHide="{{__('Show with read messages')}}" titleShow="{{__('Show only unread messages')}}">
            <x-slot name="visibleContent">
            </x-slot>
            <x-slot name="hideContent">
            </x-slot>
        </x-form.checker>

    </div>

    <div class="input-group mr-3 w-28">
                @php
                    $level = ['Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5'];                
                @endphp
        <x-form.select id="level_search" name="level_search" class="" label="{{__('Level')}}" :list="$level">
            {{ old('level_search') ?? '' }}
        </x-form.select>    

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