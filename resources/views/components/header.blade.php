
<header class="flex justify-between border z-40 shadow-xs sticky top-0 bg-white border-slate-200 py-2 items-center px-10">

    <p class="font-bold">E_Commerce</p>

    <nav class="flex gap-5 justify-center items-center">

        <a href="{{ route('home') }}" class="p-1.5 {{ request()->routeIs('home') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
            Accueil
        </a>

        <a href="{{ route('user.products') }}" class="p-1.5 {{ request()->routeIs('user.products') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
            Produits
        </a>

        @auth
            <a href="{{ route('profile') }}" class="p-1.5 {{ request()->routeIs('profile') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
                Mon compte
            </a>
        @endauth

        @auth
            <a href="{{ route('user.products') }}" class="p-1.5 {{ request()->routeIs('user.products') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
                Produits
            </a>
        @endauth

        <a href="{{ route('cart') }}" class="p-1.5 {{ request()->routeIs('cart') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
            Panier
            <span class="bg-red-500 text-gray-50 p-1 rounded">
                {{ array_sum(session('cart', [])) }}
            </span>
        </a>

        @if (Auth::user()->role === 'admin')
            <a href="{{ route('dashboard') }}" class="bg-slate-800 p-1 rounded text-xs text-gray-50" >Tableau de bord</a>
        @endif

    </nav>

    @auth

        <div class="flex justify-center items-center">

            <a class="p-1 bg-slate-800 text-white border-slate-800 border" href="">
                {{ Str::ucfirst(Auth::user()->name) }}
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="border cursor-pointer p-1 border-slate-300" type="submit">
                    Se Deconnecter
                </button>
            </form>

        </div>

    @endauth

    @guest

        <div class="flex justify-center items-center">

            <a class="p-1 bg-slate-800 text-white border-slate-800 border" href="{{ route('register') }}">
                S'inscrire
            </a>

            <a class="border p-1 border-slate-300" href="{{ route('login') }}">
                Se connecter
            </a>

        </div>

    @endguest

</header>

