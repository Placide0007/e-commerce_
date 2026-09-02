<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin section|@yield('title')</title>
</head>

<body>
    <main>
        <x-aside/>
        <section class="content grow ml-[15%] py-5 px-5 w-[85%]">
            @yield('content')
        </section>
    </main>
</body>

</html>
