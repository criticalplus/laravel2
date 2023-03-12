<div    x-data="{ show: false }"
            x-init="() => {
            setTimeout(() => show = true, 50);
            setTimeout(() => show = false, {{$timeVisible}});
            }"
        x-show="show" 
        x-cloak
        x-transition:enter="transition duration-{{$timeInTransition}}"
        x-transition:enter-start="transform translate-x-full"
        x-transition:enter-end="transform translate-x-0"

        x-transition:leave="transition duration-{{$timeOutTransition}}"
        x-transition:leave-start="transform translate-x-0 opacity-100"
        x-transition:leave-end="transform translate-x-full opacity-0"
        
        class="z-50 fixed top-2.5 right-0 w-52"
        >
    <div @click="show = false" :aria-expanded="show ? 'true' : 'false'">
                    
        <div class="flex justify-between items-center bg-{{$backColor}}-{{$backColorStrong}} @if($borderColor!="") border border-{{$borderColor}}-400 border-{{$borderStyle}} @endif  text-{{$backColor}} text-sm font-bold px-4 py-3 cursor-pointer" role="alert" >

            <p>{{$slot}}</p>
            <x-css.icon :type="$iconName" />

        </div>

    </div>
</div>
