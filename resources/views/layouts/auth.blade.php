<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>E_commerce|@yield('title')</title>
</head>

<body>
    <section class="content bg-slate-950">
        @yield('content')
    </section>
</body>

</html>
