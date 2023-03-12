<div class="flex w-full {{$class}}" x-data="{ open: {{$visibility1}}, close: {{$visibility2}}}" >
    
    <div class="w-{{$width}} form-check flex z-0 group">
        <input  x-on:click="open = ! open, close = ! close"   @click="{{$click1}} = {{$click2}}" 
                type="checkbox" 
                id="{{$checkName}}" 
                @if($checked=='true' OR $checked==1)
                    checked 
                @endif
                name="{{$checkName}}"  
                value="1" 
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" >
        <label class="form-check-label inline-block text-gray-800" for="{{$checkName}}">
            
            <div x-show="open" >
                {{$titleShow}}
            </div>
    
            <div x-show="close" x-cloak>
                {{$titleHide}}
            </div>
        </label>
    </div>

    @if( $visibleContent!="" OR $hideContent!="" )
        <div class="checkerContent relative z-0 w-full group">
            
            <div x-show="open" >
                {{$visibleContent}}
            </div>

            <div x-show="close" x-cloak>
                {{$hideContent}}
            </div>
        </div>
    @endif

</div>