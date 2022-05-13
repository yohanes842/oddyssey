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
        <title>@yield('title')</title>
    </head>
    <body class="bg-[#f3f4f6] w-screen p-20 body-font font-poppins">
        <div class="card bg-white m-auto p-5 shadow-md w-[50vw] h-fit text-gray-500 text-sm">
            @yield('form')
        </div>
        <div class="notification-container">
            @yield('notification')    
        </div>  
    </body>
</html>
