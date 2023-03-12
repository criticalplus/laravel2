@props( ['id' => '', 'name' => '' , 'class' => '', 'label' => '' , 'pattern' => false, 'required' => false, 'placeholder' => '' ] )

<div>

        <label for="{{$name}}" class="z-50 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{  __( ucfirst($label) ) }}</label>

        <p :class="{'hidden': !show, 'block':show }" class="flex"> 
                <textarea id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}" :class="{'hidden': !show, 'block':show }" rows="4" class="hidden @error($name) border-red-500 @enderror {{$class}} block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="..." value="{{ $slot }}" 
                @if ( $required )
                        required 
                @endif      
                >{{ $slot }}</textarea>
                <span @click="show = !show">
                        <x-css.icon class="float-right ml-1" type="reply"/>
                </span>
        </p>
        
        <p  @click="show = !show" 
            :class="{'hidden': show, 'flex':!show }"
            class="py-2 flex">
                {{ $slot }} 
                <x-css.icon class="float-right ml-2" type="edit"/>
        </p>
                   
        
        @error($name)
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
        @enderror
  
</div>