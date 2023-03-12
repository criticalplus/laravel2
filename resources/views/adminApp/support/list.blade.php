<x-AdminApp>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supports List') }}
        </h2>
    </x-slot>



            <div class="mb-3 px-4 flex tems-end items-end justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">
                <div class="p-2 self-center">
                   Lista de Tickets
                </div>

                <div class="p-2 px-4">
                    @include('adminApp.support.forms.search', ['roles' => $roles])
                </div>

{{--                 <div class="flex flex-row items-end p-2">
                </div> --}}

            </div>           


            <div class="p-5 bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-400">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'id', __('Id')  )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'user.name', __('User')  )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'admin.name', __('Admin') )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'subject', __('Subject') )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'support_thread_count', __('Not Read') )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'level', __('Level') )</th>
                        <th scope="col" class="px-3 py-2">@sortablelink( 'updated_at', __('Updated') )</th>
                        <th scope="col" class="px-1 py-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    @if( isset( $list[0] ) AND $list != NULL )
                        
                        @foreach ($list as $support)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-3 py-2">{{$support->id}}</td>
                                <td class="px-3 py-2">
                                    @if( isset($support->user->name))
                                        {{$support->user->name}}
                                    <span class="{{ strtolower($support->user->UserData->role) }} float-right text-xs font-semibold inline-block py-1 px-2 rounded text-neutral-600 bg-neutral-200 uppercase last:mr-0 mr-1">
                                        <small>{{ $support->user->UserData->role }}</small>
                                    </span>
                                    @else
                                        {{$support->replyName}}
                                        <span class="float-right text-xs font-semibold inline-block py-1 px-2 rounded text-neutral-600 bg-neutral-200 uppercase last:mr-0 mr-1">
                                            <small>{{ __('NOT REGISTERED') }}</small>
                                        </span>
                                    @endif
                                </td>
                                <td class="px-3 py-2">
                                    @if( isset($support->admin->name))
                                        {{$support->admin->name}}
                                    @else
                                        {{ __('Not assigned') }}
                                    @endif
                                </td>
                                <td class="px-3 py-2">{{ $support->subject }}</td>
                                <td class=" text-center">
                                    <span class="px-2 py-1 @if($support->support_thread_count>0)bg-green-500 hover:bg-blue-700 text-white font-bold rounded-full @endif">{{ $support->support_thread_count }}</span>
                                </td>
                                <td class="px-3 py-2"><span class="label-level-{{$support->level}}">{{ $support->level }}</span></td>
                                <td class="px-3 py-2">{{$support->updated_at}}</td>
                                <td class="px-1 py-2 text-center">
                                    <x-css.dropDownList routeDestroy="users.destroy" routeView="support.show" idRoute="{{$support->id}}" />
                                </td>
                            </tr>  
                        @endforeach

                    @else

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="10" class="text-center">{{ __('No search result')}}</td>
                        </tr>

                    @endif
                    
                    </tbody>
              </table>


            </div>
            
            @if( isset( $list ) AND $list != NULL )
                <div class="mt-5"> {{ $list->links() }}</div>
            @endif
           
</x-AdminApp>
