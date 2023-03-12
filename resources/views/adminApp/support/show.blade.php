<x-AdminApp>

    <div class="mb-3 px-4 flex tems-end items-end justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">
        <div class="p-2 self-center">
            {{__('Ticket')}}
        </div>
        <div class="p-2 self-center">
            ID: {{$support->id}}
        </div>
    </div>           


        <div class="p-5 bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">

            <div class="flex gap-2 flex-wrap lg:flex-nowrap">

                <!-- Left Side -->
                <div class="w-full lg:w-1/3 ">
                    
                    <div class="bg-white p-3 border-t-4 border-green-700">
                        <div class="image overflow-hidden text-center">
                            <x-css.icon type="account_circle" class="text-green-800" style="font-size:200px"/>
                        </div>


                        <div class="relative z-0 w-full mb-6 group">
                                {{$support->user->name ?? __('Not Register Form Ticket: ')}}<br>{{$support->replyName}}
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                                {{ $support->user->email ?? $support->replyMail ?? '' }}
                        </div>


                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{__('Modified')}}</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$support->user->updated_at ?? ''}}</p>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{__('Created')}}</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$support->user->created_at ?? ''}}</p>


                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>{{__('Level')}}</span>
                                <div class="relative z-0 w-full group">
                                    <span class="float-right"><span class="{{ strtolower($support->user->UserData->role ?? '') }} inline-block py-1 px-2 rounded text-neutral-600 bg-neutral-200 uppercase last:mr-0 mr-1"><small>{{ $support->user->UserData->role ?? '' }}</small></span></span>   
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    {{-- ADMIN --}}
                    <div class="bg-white p-3 border-t-4 border-blue-700 mt-4">
                        <div class="image overflow-hidden text-center">
                            <x-css.icon type="account_circle" class="text-blue-800" style="font-size:200px"/>
                        </div>


                        <div class="relative z-0 w-full mb-6 group">
                                {{ $support->admin->name ?? 'Not assigned' }}
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                                {{ $support->admin->email ?? '' }}
                        </div>
                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>{{__('Level')}}</span>
                                <div class="relative z-0 w-full group">
                                    <span class="float-right"><span class="level-admin inline-block py-1 px-2 rounded text-neutral-600 bg-neutral-200 uppercase last:mr-0 mr-1"><small>{{__('ADMIN')}}</small></span></span>   
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Right Side -->
                <div class="w-full lg:w-2/3 flex gap-2 flex-col	">
                    
                    <!-- Right Side 1 -->
                    <div class="bg-white p-3 shadow-sm rounded-sm xl:p-6">
                        <div class="flex items-center space-x-2 mb-4 font-semibold text-gray-900 leading-8">
                            <x-css.icon type="support_agent"/>
                            <span class="tracking-wide">{{__('Thread')}}</span>
                        </div>
                        <div class="text-gray-800 mb-6">
                            {{__('Subject')}}: {{$support->subject}}
                        </div>

                        <div class="bg-gray-100 p-1 mb-2 shadow-sm rounded-sm xl:p-6">
                            <form action="{{ route('support.update', [$support]) }}" method="POST" class=""  enctype="multipart/form-data">
            
                                @csrf

                                <x-form.textArea name="threadComment"/>
                                <x-form.inputFile name="threadFile"/>

                                <x-form.button type="submit" label="Submit" color="green" class="mt-2" />

                            </form>
                        </div>


                        <div class="text-gray-700 pt-4">
                            <div class="flex flex-col">

                                <ol class="relative border-l border-gray-200 dark:border-gray-700">        
                                    @foreach( $support->supportComment as $sup )

                                        <li class="mb-10 ml-4 p-2 rounded" x-data="{hov: false}" :class="hov ? 'bg-gray-50' : ''">

                                            <div class="mb-1 text-sm font-normal leading-none text-gray-700 dark:text-gray-500 dark:bg-gray-700">
                                                {{-- @dump($sup->user_id)
                                                @dump($support->user_id) --}}
                                                @if( $support->user_id != null )
                                                    {{$sup->isAdmin ? 'Admin: '.$support->admin->name : 'User: '.$support->user->name }}
                                                @else
                                                    {{__('Not Register Form Ticket: ')}}<br>{{$support->replyName}}
                                                @endisset
                                            </div>

                                            <div class="mb-1 text-sm font-normal leading-none text-gray-600 dark:text-gray-500">{{$sup->updated_at}}</div>

                                            <div class="image overflow-hidden float-left mr-3">
                                                <x-css.icon type="account_circle" class="text-{{$sup->isAdmin ? 'blue' : 'green'}}-800" style="font-size:80px"/>
                                            </div>
                                            <div class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><small>IP: </small>{{$sup->ip}}</div>
                                            <div class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><small>MAC: </small>{{$sup->mac}}</div>
      
                                            <div class="w-32 float-right"  @mouseover="hov=true" @mouseover.away="hov=false" >
                                                <x-css.deleteIconForm routeDestroy="support.destroyT" :idRoute="$sup->id" />
                                            </div>
                                            <p class="mb-4 text-base font-normal text-gray-600 dark:text-gray-400">{{$sup->message}}</p>

                                            @isset($sup->file)

                                                <div x-data="{showModal: false}" x-cloak>
                                                    <div type="button" class="mx-auto bg-transparent cursor-pointer w-fit" @click="showModal = true">
                                                        <img src="{{$sup->file}}" width="400" height="300" @click="modal = !modal" :aria-expanded="modal ? 'true' : 'false'">
                                                    </div>

                                                    <!--Overlay-->
                                                    <div class="fixed overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'inset-0 z-10 flex items-center justify-center': showModal }">
                                                        <!--Dialog-->
                                                        <div class="bg-white w-11/12  mx-auto rounded shadow-lg py-4 text-left px-6" 
                                                        x-show="showModal" @click.away="showModal = false">

                                                            <p class="flex justify-center">
                                                                <img src="{{$sup->file}}" width="1200" height="800" @click="modal = !modal" :aria-expanded="modal ? 'true' : 'false'">
                                                            </p>
                                                            
                                                            <div class="flex justify-end pt-2">
                                                                <button class="mx-auto modal-close px-4 bg-green-600 p-3 rounded-lg text-white hover:bg-green-400" @click="showModal = false">{{__('Close')}}</button>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            @endisset  

                                        </li>
                
                                    @endforeach          
                                </ol>
                
                                

                                
                            </div>
                        </div>

                    </div> 
                    


                    


                </div>




        </div>


    
</x-AdminApp>