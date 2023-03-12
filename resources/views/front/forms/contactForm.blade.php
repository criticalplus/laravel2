
<h5 class="my-4 text-3xl leading-tight">
    {{ __('Frase gancho') }}
</h5>
    
<form id="indexContactForm" action="{{ route('contactForm') }}" method="POST" class="text-gray-800 max-w-sm m-auto	">
    
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  {{-- <input type="hidden" name="id" value=""> --}}
    
  <div class="max-w-full md:justify-center mb-6">
{{--       <label class="my-4 text-gray-100 leading-tight" for="name">{{__('Name')}}</label> --}}
      <div class="flex rounded-md shadow-sm">
          <input
            type="text"
            name="name"
            class="w-full px-4 py-2 text-center font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
            m-0 focus:text-gray-700 focus:bg-white focus:border-red-800 focus:outline-none" 
            placeholder="{{__('Name')}}" 
            value=@auth "{{old('name', $user->name)}}" @else "{{ old('name') ?? '' }}" @endauth />
        </div>
        @error('name')
          <span class=""><small>{{$message}}</small></span>
        @enderror
  </div>

    <div class="max-w-full md:justify-center mb-6">
      <div class="flex rounded-md shadow-sm">
          <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
              @
          </span>
          <input
            type="text"
            name="email"
            class="w-full px-4 py-2 text-center font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
            m-0 focus:text-gray-700 focus:bg-white focus:border-red-800 focus:outline-none"
            placeholder="{{__('Email')}}" 
            value=@auth"{{old('email', $user->email)}}" @else "{{ old('email') ?? '' }}" @endauth />
        </div>
        @error('email')
          <span class=""><small>{{$message}}</small></span>
        @enderror
  </div>

  <div class="max-w-full md:justify-center mb-6">
    <label class="my-4 text-gray-100 leading-tight" for="contactMessage">{{__('Message')}}</label>
    <div class="flex rounded-md shadow-sm">
        <textarea class="
          form-control block w-full px-3 py-1.5 text-base text-center font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
           m-0 focus:text-gray-700 focus:bg-white focus:border-red-800 focus:outline-none"
          id="textAreaContactForm"
          rows="3"
          name="contactMessage"
          placeholder="Message">{{ old('contactMessage') ?? '' }}</textarea>
      </div>
      @error('contactMessage')
        <span class=""><small>{{$message}}</small></span>
      @enderror
  </div>

      <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        Submit
      </button>

  </form>