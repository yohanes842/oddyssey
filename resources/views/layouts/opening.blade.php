<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link
            rel="stylesheet"
            href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
        <link href="/css/app.css" rel="stylesheet" />
        <script src="/js/app.js" defer></script>
        <title>@yield('title')</title>
    </head>
    <body class="bg-[#f3f4f6] w-full h-screen body-font font-poppins">
        <div
            class="opening-content w-screen h-screen flex flex-col items-center justify-center"
        >
            <a href="{{ route('dashboard') }}" class="logo rounded-[50%] p-2 hover:scale-105 mb-5">
                <img
                    class="mb-4"
                    src="{{ asset('assets/Logo.png') }}"
                    alt="Logo"
                    width="100px"
                />
            </a>
            <div class="card bg-white shadow-md p-5 w-[25vw] text-gray-500">
                @yield('form')
            </div>
        </div>  
        <div class="notification-container">
            @yield('notification')    
        </div>  
        
    </body>
</html>
