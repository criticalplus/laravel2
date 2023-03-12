@props( ['id' => '', 'name' => '' , 'class' => '', 'label' => '' , 'pattern' => false, 'required' => false, 'placeholder' => '' ] )

<div class="relative">

        <label for="{{$name}}" class="z-50 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{  __( ucfirst($label) ) }}</label>

        <p class="flex"> 
                <textarea id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}" rows="4" class="mb-2 @error($name) border-red-500 @enderror {{$class}} block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="..." value="{{ $slot }}" 
                @if ( $required )
                        required 
                @endif      
                >{{ $slot }}</textarea>
        </p>
        
        
        @error($name)
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
        @enderror
  
</div>