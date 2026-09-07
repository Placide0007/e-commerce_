@extends('layouts.base')

@section('title', 'Home page')

@section('content')

{{-- hero de recherche --}}

<div class="hero-section px-10 py-3 bg-slate-50">

    <div class="flex justify-end items-center">
        <div class="flex justify-center py-5">
            <input class="border p-1 bg-white border-slate-300" placeholder="Recherche..." type="text" name="search">
            <button class="text-xs p-1 bg-slate-800 text-gray-300">Recherche</button>
        </div>
    </div>

    {{-- section pour produits recents --}}

    <div class="py-5" >
        
        <p class="text-3xl underline font-semibold py-2">Produits recents</p>

        <div class="grid grid-cols-4 py-5 gap-5">

            @forelse ($products as $product)

                <div class="text-slate-800 shadow-xs border border-slate-300 relative bg-white rounded p-1 h-full">

                    <div class="group relative">

                        <img class="h-65 w-full object-cover rounded" src="{{ asset('images/products/' . $product->image) }}" alt="">

                        <div class="opacity-0 flex flex-col gap-2 absolute inset-0 transition duration-300 group-hover:opacity-100 bg-gray/10 backdrop-blur-sm items-center justify-center">

                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-slate-800 text-[11px] text-white p-2 rounded cursor-pointer">
                                    Ajouter au Panier
                                </button>
                            </form>

                        </div>

                        <div class="flex flex-col justify-end items-end  gap-1 text-end px-6">

                            <p class="font-semibold">{{ Str::ucfirst($product->name) }}</p>

                            <div class="flex items-center justify-between">

                                <h2 class="font-bold text-xl">
                                    {{ number_format($product->price, 0, ',', '.') }} Ar
                                </h2>

                            </div>

                        </div>

                    </div>

                    <div class="w-full flex p-3">

                        <a class="bg-slate-800 text-center cursor-pointer w-full text-gray-300 text-xs p-2" href="{{ route('products.show', $product) }}">
                            Plus de details
                        </a>

                    </div>

                    <button class="absolute top-0 p-1 bg-red-100 left-0 text-[10px] font-bold text-red-600">
                        {{ $product->stock }} disponible(s)
                    </button>

                </div>

            @empty
                <p>Aucun produit</p>
            @endforelse

        </div>

        <div class="flex justify-end items-center mt-5">
            {{ $products->links() }}
        </div>

    </div>

</div>

{{-- produits par categories section --}}

<div class="py-3 px-10">

    <p class="text-3xl underline font-semibold py-10">Par categories</p>

    <div class="flex gap-3">

        <a href="{{ route('home') }}" class="bg-slate-800 text-xs p-1 rounded text-white">
            Tous
        </a>

        @foreach ($categories as $category)

            <a href="{{ route('home', ['category' => $category->id]) }}" class="border text-xs border-slate-200 p-1">
                {{ Str::ucfirst($category->name) }}
            </a>

        @endforeach

    </div>

    <div class="grid grid-cols-4 py-5 gap-5 z-0">

        @forelse ($categoryProducts as $product)

            <div class="text-slate-800 relative shadow-xs border border-slate-300 bg-white rounded p-1 h-full">

                <div class="group relative">

                    <img class="h-65 w-full object-cover rounded" src="{{ asset('images/products/' . $product->image) }}" alt="">

                    <div class="opacity-0 flex flex-col gap-2 absolute inset-0 transition duration-300 group-hover:opacity-100 bg-gray/10 backdrop-blur-sm items-center justify-center">

                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-slate-800 text-[11px] text-white p-2 rounded cursor-pointer">
                                Ajouter au Panier
                            </button>
                        </form>

                    </div>

                    <div class="flex flex-col gap-1 justify-end items-end px-6">

                        <p class="font-semibold">{{ Str::ucfirst($product->name) }}</p>

                        <h2 class="font-bold text-xl">
                            {{ number_format($product->price, 0, ',', '.') }} Ar
                        </h2>

                    </div>

                </div>

                <div class="w-full flex p-3">

                    <a class="bg-slate-800 text-center cursor-pointer w-full text-gray-300 text-xs p-2" href="{{ route('products.show', $product) }}">
                        Plus de details
                    </a>

                </div>

                <button class="absolute top-0 p-1 bg-red-100 left-0 text-[10px] font-bold text-red-600">
                    {{ $product->stock }} disponible(s)
                </button>

            </div>

        @empty

            <p>Aucun produit</p>

        @endforelse

    </div>

    <div class="flex justify-end items-center mt-5">
        {{ $categoryProducts->links() }}
    </div>

</div>

@endsection

