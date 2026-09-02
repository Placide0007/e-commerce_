<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>E_commerce|@yield('title')</title>
</head>

<body>
    <main class="min-h-screen flex flex-col text-slate-800">
        <x-header />
        <section class="content grow ">
            @yield('content')
        </section>
        <x-footer />
    </main>
</body>

</html>
