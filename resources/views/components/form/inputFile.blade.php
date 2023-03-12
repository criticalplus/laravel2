@props( ['id' => '' ,'name' => '' , 'class' => '', 'label' => ''  ] )

<div class="flex">
  <div class="mb-3 w-96">
    <label for="formFileSm" class="form-label inline-block mb-2 text-gray-700">{{$label}}</label>
    <input class="form-control
    block
    w-full
    px-2
    py-1
    text-sm
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none {{$class}}" 
    id="{{$id}}" 
    type="file"
    name="{{$name}}">
  </div>
  @error($name)
  <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
  @enderror
</div>