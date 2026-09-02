<aside class="fixed  w-[15%] h-full text-slate-800 bg-white border py-2 border-slate-300">

    <p class="text-center font-bold text-xl underline mb-4">Admin section</p>

    <ul class="flex flex-col gap-6 px-7">

        <a href="">Tableau de bord</a>

        <a href="{{ route('users.index') }}">Utilisateurs</a>

        <a href="{{ route('products.index') }}">Produits</a>

        <a href="">Commandes</a>

        <a href="">Categories</a>

    </ul>

    <a class="absolute bottom-0 text-center bg-slate-800 text-white w-full p-2" href="{{ route('home') }}">
        Site Public
    </a>

</aside>
