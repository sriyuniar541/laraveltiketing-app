<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document - @yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    .btn_color {
        background-color: #ff9494;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
    }
</style>

<body>
    <div class="container">@yield('content')</div>
</body>

</html>