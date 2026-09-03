<header class="flex justify-between border shadow-xs sticky top-0 bg-white border-slate-200 py-2 items-center px-10">

    <p class="font-bold" >E_Commerce</p>

    <nav class="flex gap-5 justify-center items-center" >

        <a href="{{ route('home') }}" class="p-1.5 {{ request()->routeIs('home') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
            Accueil
        </a>

        <a href="" class="p-1.5 hover:bg-gray-200">
            Produits
        </a>

        <a href="{{ route('profile') }}" class="p-1.5 {{ request()->routeIs('profile') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
            Mon compte
        </a>

        <a href="">Shop[10]</a>

    </nav>

    <div class="flex justify-center items-center" >
        <a class=" p-1 bg-slate-800 text-white border-slate-800 border" href="{{ route('register') }}">S'inscrire</a>
        <a class="border p-1 border-slate-300" href="{{ route('login') }}">Se connecter</a>
    </div>
    
</header>