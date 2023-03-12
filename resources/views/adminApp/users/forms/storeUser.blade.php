<form action="{{ route('users.store') }}" method="POST">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="">

    <div class="relative z-0 w-full mb-6 group">
        <x-form.input type="text" name="name" class="" label="Name" {{-- required="true" --}}>
            {{ old('name') ?? '' }}
        </x-form.input>
    </div>

    <div class="relative z-0 w-full mb-6 group">
        <x-form.input type="email" name="email" class="" label="Email" {{-- required="true" --}}>
            {{ old('email') ?? '' }}
        </x-form.input>
        
    </div>

    @php
        $var=old('checkerPassword');
        if( isset($var)) {
            if( $var == 'true' ){
                $check = old('checkerPassword');
            }else{
                $check = 'true';
            }
        }else{
            $check = 'false';
        }
    @endphp

    <div class="relative z-0 w-full mb-2 group">

        <x-form.checker checkName="checkerPassword" :checked="$check" titleShow="{{__('Send new password via email')}}" titleHide="{{__('I want to enter a password')}}">

            <x-slot name="visibleContent">
                <x-css.icon type="mail"/>
            </x-slot>

            <x-slot name="hideContent">

                <div class="flex xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 w-full mb-2 group mr-4">
                        <x-form.input type="password" name="floating_password" id="floating_password" class="" label="Password" {{-- required="true" --}} >
                            {{ old('floating_password') ?? '' }}
                        </x-form.input>        
                    </div>
        
                    <div class="relative z-0 w-full mb-2 group">
                        <x-form.input type="password" name="repeat_password" id="floating_repeat_password" class="" label="Confirm password" {{-- required="true"  --}}>
                            {{ old('repeat_password') ?? '' }}
                        </x-form.input>      
                    </div>
                </div>
            </x-slot>

        </x-form.checker>
        
    </div>

    <div class="flex xl:grid-cols-2 xl:gap-6">

        <div class="relative z-0 w-full mb-6 group">
            <x-form.select name="role" class="" label="role" {{-- required="true"  --}}:list="$roles">
                {{ old('role') ?? '' }}
            </x-form.select>        
        </div>

        <div class="relative z-0 w-full mb-6 ml-6 group">            
            <x-form.input type="text" name="dni" id="floating_dni" class="" label="Dni" {{-- required="false" pattern="[0-9]{8}-[a-z]{1}"  --}}>
                {{ old('dni') ?? '' }}
            </x-form.input>
        </div>

    </div>
    
    <x-css.submitButton action="create"/>

  </form>
{{--   {{var_dump(old('checkerPassword'))}} --}}