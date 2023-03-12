<x-AdminApp>

    <div class="mb-3 px-4 flex tems-end items-end justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">
        <div class="p-2 self-center">
            Perfil de usuario
        </div>
        <div class="p-2 self-center">
            ID: {{$user->id}}
        </div>
    </div>           

    <form action="{{ route('users.update', ['data',$user->id]) }}" method="POST" x-data="{ show: false }" >
        
        @csrf

        <div class="p-5 bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">

            <div class="flex gap-2 flex-wrap lg:flex-nowrap">

                <!-- Left Side -->
                <div class="w-full lg:w-1/3 flex gap-2 flex-col	justify-between">
                    
                    <div class="bg-white p-3 border-t-4 border-green-700">
                        <div class="image overflow-hidden text-center">
                            <x-css.icon type="account_circle" class="text-green-800" style="font-size:200px"/>
                        </div>


                        <div class="relative z-0 w-full mb-6 group cursor-pointer">
                            <x-form.inputEdit type="text" name="name" class="" label="Name" {{-- required="true" --}}>
                                {{ old('name') ?? $user->name ?? '' }}
                            </x-form.inputEdit>
                        </div>
                        <div class="relative z-0 w-full mb-6 group cursor-pointer">
                            <x-form.inputEdit type="email" name="email" class="" label="Email" {{-- required="true" --}}>
                                {{ old('email') ?? $user->email ?? '' }}
                            </x-form.inputEdit>
                        </div>


                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{__('Modified')}}</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$user->updated_at}}</p>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{__('Created')}}</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$user->created_at}}</p>

                    </div>
                    
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>{{__('Status')}}</span>
                                    <div class="relative z-0 w-full group">
                                        <x-form.selectEdit name="role" class="" label="role" {{-- required="true"  --}}:list="$roles" role="{{ $user->UserData->role }}">
                                            <span class="ml-auto"><span class="{{ strtolower($user->UserData->role) }} inline-block py-1 px-2 rounded text-neutral-600 bg-neutral-200 uppercase last:mr-0 mr-1"><small>{{ $user->UserData->role }}</small></span></span>
                                        </x-form.selectEdit>        
                                    </div>
                            </li>
                            <li class="flex items-center py-3">
                                <span>{{__('Birthday')}}</span>
                                <span class="ml-auto">{{ date('j F, Y', strtotime($user->UserData->birthday)) }}</span>
                            </li>
                        </ul>
                    
                    </div>

                </div>

                <!-- Right Side -->
                <div class="w-full lg:w-2/3 flex gap-2 flex-col	justify-between	">
                    
                    <!-- Right Side 1 -->
                    <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6">
                        <div class="flex items-center space-x-2 mb-4 font-semibold text-gray-900 leading-8">
                            <x-css.icon type="person_outline"/>
                            <span class="tracking-wide">{{__('About')}}</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="flex flex-col">

                                <div class="grid grid-cols-3 items-center">
                                    <div class="px-3 py-1 font-semibold">{{_('First Name')}}</div>
                                    <div class="px-3 py-1 col-span-2">
                                        <div class="relative z-0 w-full group cursor-pointer">
                                            <x-form.inputEdit type="text" name="firstname" class="" label="" {{-- required="true" --}}>
                                                {{ old('firstname') ?? $user->UserData->firstname ?? '' }}
                                            </x-form.inputEdit>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-3 items-center">
                                    <div class="px-3 py-1 font-semibold">{{_('Last Name')}}</div>
                                    <div class="px-3 py-1 col-span-2">
                                        <div class="relative z-0 w-full group cursor-pointer">
                                            <x-form.inputEdit type="text" name="lastname" class="" label="" {{-- required="true" --}}>
                                                {{ old('lastname') ?? $user->UserData->lastname ?? '' }}
                                            </x-form.inputEdit>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-3 items-center">
                                    <div class="px-3 py-1 font-semibold">{{_('Dni')}}</div>
                                    <div class="px-3 py-1 col-span-2">
                                        <div class="relative z-0 w-full group cursor-pointer">
                                            <x-form.inputEdit type="text" name="dni" class="" label="" {{-- required="true" --}}>
                                                {{ old('dni') ?? $user->UserData->dni ?? '' }}
                                            </x-form.inputEdit>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>

                    </div> 
                    
                    <!-- Right Side 2 -->
                    <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6">
                       
                        <div class="flex items-center space-x-2 mb-4 font-semibold text-gray-900 leading-8">
                            <x-css.icon type="note_alt"/>
                            <span class="tracking-wide">{{__('More')}}</span>
                        </div>

                        

                        <div class="flex w-9/12 my-4 m-auto">
                            <x-form.checker checkName="checkerNewsletter" :checked="$user->UserData->newsletter" titleShow="{{__('Newsletter suscription Yes')}}" titleHide="{{__('Newsletter suscription No')}}" click1="show" click2="true" />
                            <x-css.icon type="mail"/>
                        </div>
                        
                        <div class="relative z-0 w-full group cursor-pointer">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{__('Notes')}}</label>
                            <x-form.textAreaEdit type="text" name="notes" class="" label="" {{-- required="true" --}}>
                                {{ old('notes') ?? $user->UserData->notes ?? '' }}
                            </x-form.textAreaEdit>
                        </div>


                    </div>
                    
                    <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6">
                        

                            <div class="my-3 px-4 text-center font-bold ">
                                <button 
                                    x-cloak x-transition:enter="transition ease-out duration-1000" 
                                    x-transition:enter-start="opacity-0 transform scale-90" 
                                    x-transition:enter-end="opacity-100 transform scale-100" 
                                    x-transition:leave="transition ease-in duration-1000" 
                                    x-transition:leave-start="opacity-100 transform scale-100" 
                                    x-transition:leave-end="opacity-0 transform scale-90" 
                                    type="submit" 
                                    x-bind:disabled="!show"
                                    class="w-full p-2 self-center text-white bg-green-600 overflow-hidden shadow-sm sm:rounded-lg disabled:bg-gray-300 ">
                                    {{  Str::upper( __('Update') ) }}
                                </button>
                            </div>  
                        </form>

                    </div>

                </div>

        </div>


        <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6 mt-4">

            <div class="flex items-center space-x-2 mb-4 font-semibold text-gray-900 leading-8 justify-between">
                <div class="flex items-center">
                    <x-css.icon type="dns"/>
                    <span class="tracking-wide ml-2">{{__('Servers')}}</span>
                </div>
                
                <div>
                    <a href="{{route('userserver.create', $user->id)}}">
                        <x-css.icon type="add_circle_outline" />
                    </a>
                </div>

            </div>


            <ol>        
                @foreach( $user->UserServer as $ser )

                <li class="mb-10 ml-4">
                    <x-cards.serverCard :ser="$ser"/>
                </li>

                @endforeach          
            </ol>

        </div>



        

        <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6 mt-4">

            <div class="flex items-center space-x-2 mb-4 font-semibold text-gray-900 leading-8">
                <x-css.icon type="lock"/>
                <span class="tracking-wide">{{__('Password')}}</span>
            </div>
            
            {{-- FORMULARIO DE MODIFICAR USUARIO LOGUEADO -> meto inputs para contraseña --}}
            @if( Auth::user()->id == $user->id )        
        
                <form action="{{ route('users.update', [$user->id, 'pass']) }}" method="POST" x-data="{formPass1: true}" x-init="
                    input = document.getElementById('floating_password');
                    input.addEventListener('input', updateValue); 
                    function updateValue(e) {
                        if( e.srcElement.value != '' ){
                            formPass1 = false;
                        }else{
                            formPass1 = true;
                        }
                    }">
                    @csrf
                    <div class="relative z-0 w-full mb-6 group">
                        <x-form.input type="password" name="floating_password" id="floating_password" class="" label="Password" {{-- required="true" --}} >
                            {{ old('floating_password') ?? '' }}
                        </x-form.input>        
                    </div>
        
                    <div class="relative z-0 w-full mb-6 group">
                        <x-form.input type="password" name="repeat_password" id="floating_repeat_password" class="" label="Confirm password"  required="true"  >
                            {{ old('repeat_password') ?? '' }}
                        </x-form.input>      
                    </div>
                        
                    <div class="my-3 px-4 text-center font-bold ">
                        <button x-bind:disabled="formPass1" 
                            type="submit" 
                            class="w-full p-2 self-center text-white bg-green-600 overflow-hidden shadow-sm sm:rounded-lg disabled:bg-gray-300 "
                            disabled>
                            {{  Str::upper( __('Update') ) }}
                        </button>
                    </div> 
                </form>
            
            {{-- FORMULARIO DE MODIFICAR NO LOGUEADO -> meto checkbox para elegir cambiar o no pass y dentro otro para generar o introducir contraseña --}}
            @elseif( Auth::user()->id != $user->id )
        
                <div class="relative z-0 w-full mb-6 group">
        
                    <x-form.passEmailChange :user="$user" />
    
                </div>
            
            @endif      

        </div>


            <div class="flex gap-2 flex-wrap lg:flex-nowrap">
                
                <div class="w-full lg:w-1/3 ">
                    <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6 mt-4">
                
                        <div class="flex items-center space-x-2 mb-4 font-semibold text-gray-900 leading-8">
                            <x-css.icon type="support_agent"/>
                            <span class="tracking-wide">{{__('Support')}}</span>
                        </div>

                        <ol class="relative border-l border-gray-200 dark:border-gray-700">        
                            @foreach( $user->support as $sup )

                            <li class="mb-10 ml-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{$sup->updated_at}}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$sup->subject}}</h3>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"></p>
                                <span class="label-level-{{$sup->level}}">{{$sup->level}}</span>
                                <a href="{{ route('support.show', $sup) }}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">{{__('View')}}&nbsp;&nbsp;&nbsp;
                                    <x-css.icon type="visibility" />
                                </a>
                            </li>

                            @endforeach          
                        </ol>
                    </div>
                </div>

                <div class="w-full lg:w-2/3 flex gap-2 flex-col	">
                    <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6 mt-4">
                    

                        <div class="flex items-center space-x-2 mb-4 font-semibold text-gray-900 leading-8">
                            <x-css.icon type="place"/>
                            <span class="tracking-wide">{{__('Addresses')}}</span>
                        </div>
  
                        @foreach( $user->address as $dir )

                        <li class="mb-6 list-none	">
                            
                           <x-cards.addressCard :dir="$dir"/>                       

                        </li>

                        @endforeach  

                        
                    </div>

                </div>
            </div>


            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf                    
                @method('delete')
                <div class="my-3 px-4 text-center font-bold ">
                    <button x-bind:disabled="formPass1" 
                        type="submit" 
                        class="w-full p-2 self-center text-white bg-red-600 font-bold overflow-hidden shadow-sm sm:rounded-lg disabled:bg-gray-300 "
                        disabled  onclick="return confirm('¿Confirmar?')">
                        {{  Str::upper( __('Delete') ) }}
                    </button>
                </div> 
            </form>
    
</x-AdminApp>
