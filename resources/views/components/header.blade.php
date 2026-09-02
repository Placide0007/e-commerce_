<header class="flex justify-between border shadow-xs sticky top-0 bg-white border-slate-200 py-2 items-center px-10">

    <p class="font-bold" >E_Commerce</p>

    <nav class="flex gap-5 justify-center items-center" >
        <a href="{{ route('home') }}">Accueil</a>
        <a href="">Produit</a>
        <a href="{{ route('profile') }}">Mon Compte</a>
        <a href="">Cart[10]</a>
    </nav>

    <div class="flex justify-center items-center" >
        <a class="border p-1 border-slate-300" href="{{ route('register') }}">S'inscrire</a>
        <a class="border p-1 border-slate-300" href="{{ route('login') }}">Se connecter</a>
    </div>
    
</header>