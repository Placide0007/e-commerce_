@extends('layouts.base')

@section('title', 'Produits|Client')

@section('content')

<div class="py-10 px-10">

    <p class="text-3xl underline font-semibold py-5">
        Tous les produits
    </p>

    <div class="grid grid-cols-4 py-5 gap-5">

        @forelse ($products as $product)

            <div class="text-slate-800 relative shadow-xs border border-slate-300 bg-white rounded p-1 h-full">

                <div class="group relative">

                    <img class="h-52 w-full object-cover rounded" src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">

                    <div class="opacity-0 flex flex-col gap-2 absolute inset-0 transition duration-300 group-hover:opacity-100 bg-gray/10 backdrop-blur-sm items-center justify-center">

                        <form action="{{ route('cart.add', $product) }}" method="POST">

                            @csrf

                            <button type="submit"
                                    class="bg-slate-800 text-[11px] text-white p-2 rounded cursor-pointer">
                                Ajouter au Panier
                            </button>

                        </form>

                    </div>

                    <div class="flex flex-col gap-1 text-end px-6">

                        <p class="font-semibold">
                            {{ Str::ucfirst($product->name) }}
                        </p>

                        <h2 class="font-bold text-xl">
                            {{ number_format($product->price, 0, ',', '.') }} Ar
                        </h2>

                    </div>

                </div>

                <div class="w-full flex p-3">

                    <a class="bg-slate-800 text-center cursor-pointer w-full text-gray-300 text-xs p-2"
                       href="{{ route('products.show', $product) }}">
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

    <div class="flex justify-center mt-5">
        {{ $products->links() }}
    </div>

</div>

@endsection

