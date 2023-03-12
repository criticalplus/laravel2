@props( ['id' => '' , 'name' => '' , 'class' => '', 'label' => '' , 'required' => 'false', 'list' => NULL ] )

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
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
        @if ( $required )
                required
        @endif  >

        
        <option value="0" selected>{{  __( ucfirst($label) ) }}</option>

        @foreach ($list as $option)
                <option 
                @if ( $option ==  $slot)
                        selected
                @endif
                value="{{$option}}">{{$option}}</option>
        @endforeach

</select> 

@error($name)
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
@enderror