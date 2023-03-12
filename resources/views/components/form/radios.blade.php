<div class="flex xl:grid-cols-2 xl:gap-6 @if($direction=='col') flex-col  @endif " x-data="{@foreach ($list as $radio1)radio{{$loop->iteration}}: {{$radio1['visibility']}},@endforeach}">

    <div class="relative lg:w-{{$width1}} w-full mb-4 group ">     

        @foreach ($list as $radio)

            <div class="form-check"  >
                <input  x-on:click="@foreach ($list as $radio2)radio{{$loop->iteration}} = false, @endforeach radio{{$loop->iteration}} = ! radio{{$loop->iteration}}" 
                        type="radio" 
                        value="{{$radio['value']}}" 
                        name="{{$radio['name']}}" 
                        id="{{$radio['name'].$loop->iteration}}" 
                        @if($radio['visibility']=='true')
                            checked 
                        @endif
                        class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" >
                <label  class="form-check-label inline-block text-gray-800" 
                        for="{{$radio['name'].$loop->iteration}}">
                    {{__($radio['label'])}}
                </label>
            </div>      

        @endforeach
    </div>
        
    <div class="relative lg:w-{{$width2}} w-full group">

        @foreach ($list as $radio)

            <div x-show="radio{{$loop->iteration}}" x-cloak>
                
                @php
                    $var = 'radioContent'.$loop->iteration;
                @endphp
                @if( isset( $$var ) )
                    {{$$var}}
                @endif

            </div>

        @endforeach

    </div>

</div>



{{-- 
<div x-data="{lists: [{name: 1, title: 'titulo 1', visibility: true}, {name: 2, title: 'titulo 2', visibility: false}], selectedListID: ''}">
    <template x-for="list in lists" :key="list.name">
        <div>
            <input x-model="selectedListID" type="radio" :value="list.name.toString()" :id="list.name" 
            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" >
            <label :for="list.name" x-text="list.title"></label>
        </div>
    </template>

    <p>Selected value: <code x-text="selectedListID"></code></p>
</div>
 --}}