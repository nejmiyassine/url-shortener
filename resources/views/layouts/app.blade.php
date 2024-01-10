<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Url Shortener | Coding Challenge</title>
</head>

<body>
    @include('layouts.navbar')

    <div class="container mx-auto" id="app">
        @yield('content')
    </div>

</body>

</html>
