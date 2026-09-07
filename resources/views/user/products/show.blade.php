
@extends('layouts.base')

@section('title', 'Produit|Client')

@section('content')

<div class="w-full px-30 py-10">

    <div class="grid grid-cols-2 gap-10 border border-slate-100 p-5 bg-white">

        <div>
            <img class="w-full h-96 object-cover rounded" src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
        </div>

        <div class="flex flex-col gap-4 justify-center">

            <p class="text-sm text-slate-500">
                {{ Str::ucfirst($product->category->name) }}
            </p>

            <h1 class="text-3xl font-bold text-slate-800">
                {{ Str::ucfirst($product->name) }}
            </h1>

            <p class="text-2xl font-bold text-slate-800">
                {{ number_format($product->price, 0, ',', '.') }} Ar
            </p>

            <p class="text-slate-600">
                {{ $product->description }}
            </p>

            <p class="text-sm text-slate-500">
                {{ $product->stock }} disponible(s)
            </p>

            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="bg-slate-800 text-white p-2 text-sm cursor-pointer">
                    Ajouter au Panier
                </button>
            </form>

        </div>

    </div>

</div>

@endsection

