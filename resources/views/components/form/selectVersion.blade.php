@props( ['id' => '' , 'name' => '' , 'class' => '', 'label' => '' , 'required' => 'false', 'list' => NULL, 'selectID' => 0 ] )

<label for="{{$name}}" class="z-50 peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400">{{  __( ucfirst($label) ) }}</label>

<select id="{{$id}}" name="{{$name}}" class="{{$class}} form-select appearance-none
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding bg-no-repeat
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
        @if ( $required )
                required
        @endif  >
        
        <option value="0" selected>{{  __( ucfirst($label) ) }}</option>
                @foreach ($list as $option)
                        <option 
                        @if ( $option->id ==  $selectID)
                                selected
                        @endif
                        value="{{$option->id}}">{{$option->name}} - {{$option->version}}</option>
                @endforeach

</select> 

@error($name)
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
@enderror