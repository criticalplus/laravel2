@props( ['id' => '' , 'type' => 'text','name' => '' , 'class' => '', 'label' => '' , 'style' => '', 'pattern' => '', 'required' => false, 'placeholder' => '' ] )

<input type="{{$type}}" id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}" class="@error($name) border-red-500 @enderror {{$class}} block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $slot }}" style="{{$style}}" 
@if ( $required )
        required 
@endif        
@if ( $pattern )
        pattern="{{$pattern}}"
@endif        
/>
<label for="{{$name}}" class="z-50 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{  __( ucfirst($label) ) }}</label>

@error($name)
<div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
@enderror