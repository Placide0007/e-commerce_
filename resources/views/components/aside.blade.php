<aside class="fixed   w-[15%] h-full bg-slate-900 text-gray-100 border-r  border-b-0 border-l-0  py-2 border-slate-800 ">

    <p class="text-center font-bold text-xl underline mb-4">Admin section</p>

    <ul class="flex flex-col gap-3 px-4">

        <a href="{{ route('dashboard') }}" class="p-1.5 {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-slate-900' : 'hover:bg-gray-200 hover:text-slate-900 ' }}">
            Dashboard
        </a>

        <a href="{{ route('users.index') }}" class="p-1.5 {{ request()->routeIs('users.index') ? 'bg-gray-200 text-slate-900' : 'hover:bg-gray-200 hover:text-slate-900 ' }}">
            Utilisateurs
        </a>

        <a href="{{ route('products.index') }}" class="p-1.5 {{ request()->routeIs('products.index') ? 'bg-gray-200 text-slate-900' : 'hover:bg-gray-200 hover:text-slate-900 ' }}">
            Produits
        </a>

        <a href="{{ route('orders') }}" class="p-1.5 {{ request()->routeIs('orders') ? 'bg-gray-200 text-slate-900' : 'hover:bg-gray-200 hover:text-slate-900 ' }}">
            Commandes
        </a>

        <a href="{{ route('categories.index') }}" class="p-1.5 {{ request()->routeIs('categories.index') ? 'bg-gray-200 text-slate-900' :'hover:bg-gray-200 hover:text-slate-900 ' }}">
            Categories
        </a>

    </ul>

    <a class="absolute  bottom-0 text-center   bg-slate-800 text-white w-full p-2" href="{{ route('home') }}">
        Section Public
    </a>

</aside>
