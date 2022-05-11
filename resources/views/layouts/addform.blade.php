<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap"
            rel="stylesheet"
        />
        <link href="/css/app.css" rel="stylesheet" />
        <title>@yield('title')</title>
    </head>
    <body class="bg-[#f3f4f6] w-screen h-screen overflow-hidden body-font font-poppins">
        <div class="card bg-white m-auto mt-20 p-5 shadow-md w-[50vw] h-fit text-gray-500 text-sm">
            @yield('form')
        </div>
    </body>
</html>
