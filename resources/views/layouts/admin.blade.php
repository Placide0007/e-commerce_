<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin section|@yield('title')</title>
</head>

<body>
    @apexchartsScripts
    <main class="flex h-screen" >
        <x-aside/>
        <section class="content grow ml-[15%] bg-slate-900 text-gray-100 py-5 px-5 w-[85%] h-screen overflow-y-auto">
            @yield('content')
        </section>
    </main>

    @stack('scripts')

</body>

</html>
