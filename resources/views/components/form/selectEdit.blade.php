@props( ['id' => '' , 'name' => '' , 'class' => '', 'label' => '' , 'required' => 'false', 'list' => NULL, 'role' => 'cliente-1'  ] )

<p :class="{'hidden': !show, 'block':show }" class="flex"> 
        <select id="{{$id}}" name="{{$name}}" class="{{$class}} form-select appearance-none
                block
                w-full
                px-3 mx-5 
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

                
                <option selected>{{  __( ucfirst($label) ) }}</option>

                @foreach ($list as $option)
                        <option 
                        @if ( strtolower($option) ==  strtolower($role))
                                selected
                        @endif
                        value="{{$option}}">{{$option}}</option>
                @endforeach

        </select> 
        <span @click="show = !show">
                <x-css.icon class="float-right ml-1" type="reply"/>
        </span>
</p>
        
<p  @click="show = !show" 
    :class="{'hidden': show, 'block':!show }"
    class="py-2 text-right">
        {{ $slot }} 
        <x-css.icon class="ml-2 float-right" type="edit"/>
</p>
      

@error($name)
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
@enderror