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
        <link
            rel="stylesheet"
            href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
        <link href="/css/app.css" rel="stylesheet" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/js/app.js" defer></script>
        <title>@yield('title')</title>
    </head>
    <body class="bg-[#f3f4f6] w-screen text-gray-500 body-font font-[poppins]">
        <header>
            @include('partials.navbar')
        </header>
        <main class="w-screen px-[15%] text-gray-700 mt-24 pb-20">
            @yield('content')
        </main>
    </body>
</html>
