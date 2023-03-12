<form action="{{ route('users.update', $user[0]->id) }}" method="POST">
    
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @csrf
{{--     <input type="hidden" name="id" value="{{ $user[0]->id ?? '' }}"> --}}

    <div class="relative z-0 w-full mb-6 group">
        <x-form.input type="text" name="name" class="" label="Name" {{-- required="true" --}}>
            {{ old('name', $user[0]->name) ?? '' }}
        </x-form.input>
    </div>

    <div class="relative z-0 w-full mb-6 group">
        <x-form.input type="email" name="email" class="" label="Email" {{-- required="true" --}}>
            {{ old('email', $user[0]->email) ?? '' }}
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

    {{-- FORMULARIO DE MODIFICAR USUARIO LOGUEADO -> meto inputs para contraseña --}}
    @if( Auth::user()->id == $user[0]->id )        

            <div class="relative z-0 w-full mb-6 group">
                <x-form.input type="password" name="floating_password" id="floating_password" class="" label="Password" {{-- required="true" --}} >
                    {{ old('floating_password') ?? '' }}
                </x-form.input>        
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <x-form.input type="password" name="repeat_password" id="floating_repeat_password" class="" label="Confirm password" {{-- required="true"  --}}>
                    {{ old('repeat_password') ?? '' }}
                </x-form.input>      
            </div>
    
    {{-- FORMULARIO DE MODIFICAR NO LOGUEADO -> meto checkbox para elegir cambiar o no pass y dentro otro para generar o introducir contraseña --}}
    @elseif( Auth::user()->id != $user[0]->id )

        <div class="relative z-0 w-full mb-6 group">

                    <x-form.radios 
                        :list="[
                            'radio1' => [
                                    'name' => 'radioCheck',
                                    'label' => 'Not Change Password',
                                    'visibility' => 'true',
                                    'value' => 1,
                                ],
                            'radio2' => [
                                    'name' => 'radioCheck',
                                    'label' => 'Change Password',
                                    'visibility' => 'false',
                                    'value' => 2,
                                ],
                            ]" >

                        <x-slot name="radioContent2">

                            <x-form.checker checkName="checkerPassword" :checked="$check" titleShow="{{__('Send password via email')}}" titleHide="{{__('I want to enter a password')}}">

                                <x-slot name="visibleContent">
                                    <x-css.icon type="mail"/>
                                </x-slot>
            
                                <x-slot name="hideContent">
            
                                    <div class="flex xl:grid-cols-2 xl:gap-6 ml-4">
                                        <div class="relative z-0 w-full group mr-4">
                                            <x-form.input type="password" name="floating_password" id="floating_password" class="" label="Password" {{-- required="true" --}} >
                                                {{ old('floating_password') ?? '' }}
                                            </x-form.input>        
                                        </div>
                            
                                        <div class="relative z-0 w-full  group">
                                            <x-form.input type="password" name="repeat_password" id="floating_repeat_password" class="" label="Confirm password" {{-- required="true"  --}}>
                                                {{ old('repeat_password') ?? '' }}
                                            </x-form.input>      
                                        </div>
                                    </div>
                                </x-slot>
            
                            </x-form.checker>

                        </x-slot>

                    </x-form.radios>

        </div>

    @endif


    <div class="flex">

        <div class="relative z-0 w-full mb-6 group">
            <x-form.select name="role" class="" label="role" {{-- required="true"  --}}:list="$roles">
                {{ old('role', $user[0]->role) ?? '' }}
            </x-form.select>        
        </div>

        <div class="relative z-0 w-full mb-6 ml-6 group">            
            <x-form.input type="text" name="dni" id="floating_dni" class="" label="Dni" {{-- required="false" pattern="[0-9]{8}-[a-z]{1}"  --}}>
                {{ old('dni', $user[0]->dni) ?? '' }}
            </x-form.input>
        </div>

    </div>
    
    <x-css.submitButton action="update"/>



</form>