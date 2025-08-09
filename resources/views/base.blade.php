<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('tilte')</title>
</head>

<body>
    @unless (isset($hideHeader) && $hideHeader)
        @include('layouts.header')
    @endunless

    <section class="content">
        @yield('content')   
    </section>
    
    @unless (isset($hideFooter) && $hideFooter)
        @include('layouts.footer')
    @endunless
    
    @stack('scripts')
    
</body>

</html>
