@vite(['resources/css/header.css'])

@php
    $cart = session('cart', []);
    $itemCount = 0;

    foreach ($cart as $item) {
        $itemCount += $item['quantity'];
    }
@endphp

<header class="navbar">
    <a href="" class="navbar-brand">
        <img src="{{ asset('images/logo.png') }}" alt="" width="55">
    </a>

    <div class="nav-link">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }} nav-item">
            Accueil
        </a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }} nav-item">
            A propos
        </a>
        <a href="{{ route('profils.index') }}" class="nav-item">
            Profile
        </a>
        <a href="{{ route('cart.index') }}" class="{{ request()->routeIs('cart.index') ? 'active' : '' }} nav-item">
            Panier
            @if (Auth::check())
                <span class="item-count"> {{ $itemCount }} </span>
            @endif
        </a>
        @if (Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('dashboard') }}"
                class=" {{ request()->routeIs('dashboard') ? 'active' : ' ' }} nav-item">
                <i class="bi bi-grid"></i>
                Dashboard
            </a>
        @endif
    </div>

    <div class="tools">
        @auth
            <button class="btn-success login-btn">{{ Str::ucfirst(Auth::user()->name) }}</button>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn-primary login-btn">Se deconnecter</button>
            </form>
        @endauth

        @guest
            <a class="btn-primary login-btn" href="{{ route('login') }}">Connexion</a>
        @endguest
    </div>
</header>
