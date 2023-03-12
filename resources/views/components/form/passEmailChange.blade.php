@props( ['user' => '' ] )

<form action="{{ route('users.update', ['pass',$user->id]) }}" method="POST" x-data="{radio1:  @if(old('radioCheck')==1) false @else true @endif , radio2:@if(old('radioCheck2')==1) false @else true @endif}" >
    @csrf
    
    <div class="flex flex-col lg:flex-row" >

        <div class="relative lg:w-1/3 w-full mb-4 group ">     

            <div class="form-check"  >
                <input  x-on:click="radio1 = true" 
                        type="radio" 
                        value="0" 
                        name="radioCheck" 
                        id="radioCheck1" 
                        @if(old('radioCheck')!=1)
                        checked 
                        @endif
                        class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" >
                <label  class="form-check-label inline-block text-gray-800" 
                        for="radioCheck1">
                    {{__('Not Change Password')}}
                </label>
            </div>    

            <div class="form-check"  >
                <input  x-on:click="radio1 = false" 
                        type="radio" 
                        value="1" 
                        name="radioCheck" 
                        id="radioCheck2" 
                        @if(old('radioCheck')==1)
                        checked 
                        @endif
                        class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" >
                <label  class="form-check-label inline-block text-gray-800" 
                        for="radioCheck2">
                    {{__('Change Password')}}
                </label>
            </div>    
    

        </div>
            

        <div class="relative lg:w-2/3 w-full group">


                <div x-show="radio1" >
                    -
                </div>

                <div x-show="!radio1" x-cloak class="flex flex-row">
                                        
                    <div class="relative lg:w-1/3 w-full mb-4 group "> 
                        <div class="form-check"  >
                            <input  x-on:click="radio2 = true" 
                                    type="radio" 
                                    value="0" 
                                    name="radioCheck2" 
                                    id="radioCheck3" 
                                    @if(old('radioCheck2')!=1)
                                    checked 
                                    @endif
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" >
                            <label  class="form-check-label inline-block text-gray-800" 
                                    for="radioCheck3">
                                {{__('Send password via email')}}
                            </label>
                        </div>
                        <div class="form-check"  >
                            <input  x-on:click="radio2 = false" 
                                    type="radio" 
                                    value="1" 
                                    name="radioCheck2" 
                                    id="radioCheck4" 
                                    @if(old('radioCheck2')==1)
                                    checked 
                                    @endif
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" >
                            <label  class="form-check-label inline-block text-gray-800" 
                                    for="radioCheck4">
                                {{__('I want to enter a password')}}
                            </label>
                        </div>            
                    </div>                    
                
                    <div class="relative lg:w-2/3 w-full group">            
                
                        <div x-show="radio2" >
                            <x-css.icon type="mail"/>                         
                        </div>
            
                        <div x-show="!radio2" x-cloak>    
                            <div class="flex flex-col gap-4">
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
                        </div>
                    </div>
                    
                </div>
                
        </div>

    </div>  


                            
    <div class="my-3 px-4 text-center font-bold ">
        <button 
            x-bind:disabled="radio1" 
            x-cloak 
            x-transition:enter="transition ease-out duration-1000" 
            x-transition:enter-start="opacity-0 transform scale-90" 
            x-transition:enter-end="opacity-100 transform scale-100" 
            x-transition:leave="transition ease-in duration-1000" 
            x-transition:leave-start="opacity-100 transform scale-100" 
            x-transition:leave-end="opacity-0 transform scale-90" 
            type="submit" 
            class="w-full p-2 self-center text-white bg-green-600 overflow-hidden shadow-sm sm:rounded-lg disabled:bg-gray-300 "
            disabled>
            {{  Str::upper( __('Update') ) }}
        </button>
    </div> 
                                    
</form>  