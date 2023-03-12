<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ dark: false }"
{{--     x-init="dark = docCookies.hasItem('dark') ? (docCookies.getItem('dark') == 'false') : true;" --}}
    x-init="    console.log(document.cookie);    "
    x-bind:class="{ 'dark': dark }"> 



    

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Fonts --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
        {{-- Styles --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- Scripts  --}}
        <script src="{{ mix('js/app.js') }}" defer></script>

        @livewireStyles

    </head>
    <body class="font-sans antialiased dark:bg-gray-700 dark:text-gray-400" >
        <div class="min-h-full  bg-gray-100  dark:bg-gray-700 dark:text-gray-400" >
            
            {{-- Partial navigation --}}
            @include('adminApp.layouts.partials.nav')
            
            {{-- Page Heading --}}
         {{--    <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            {{-- Page Content --}}
            <main>
                <div class="py-6 pb-24">
                    <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>  

        {{-- Partial Footer --}}
        @include('adminApp.layouts.partials.footer')
        
        {{-- Alerts --}}
        @include('adminApp.layouts.partials.alerts')
        
        @livewireScripts
    
    </body>
</html>
