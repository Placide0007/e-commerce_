
@extends('layouts.admin')

@section('title', 'Products|Admin')

@vite('resources/js/new_product_popup')

@section('content')

<div class="w-full">

    <div class="p-2 rounded flex justify-end">
        <a class="bg-white text-slate-900 p-1 cursor-pointer" href="">
            + Nouveau Produit
        </a>
    </div>

    <table class="w-full text-white text-center overflow-hidden">

        <thead class="bg-slate-700 text-white">
            <tr>
                <th class="border-r border-slate-700 p-2">Numero</th>
                <th class="border-r border-slate-700 p-2">Nom</th>
                <th class="border-r border-slate-700 p-2">Categorie</th>
                <th class="border-r border-slate-700 p-2">Prix(Ar)</th>
                <th class="border-r border-slate-700 p-2">Quantite</th>
                <th class="border-r border-slate-700 p-2">Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($products as $product)

                <tr class="border border-slate-800 text-left hover:bg-slate-700">

                    <td class="border p-1 text-center border-slate-800">
                        {{ Str::ucfirst($product->id) }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ Str::ucfirst($product->name) }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ $product->category->name }}
                    </td>

                    <td class="border p-1 text-center border-slate-800">
                        {{ number_format($product->price, 0, ',', '.') }}
                    </td>

                    <td class="border p-1 text-center border-slate-800">
                        {{ $product->stock }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ Str::limit($product->description, 50, '...') }}
                    </td>

                    <td class="p-1">
                        <div class="flex gap-5 justify-center items-center">

                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf

                                @method('DELETE')

                                <button type="submit" class="bg-red-500 text-white p-1 text-xs">
                                    Supprimer
                                </button>
                            </form>

                            <a class="bg-green-500 text-white p-1 text-xs" href="{{ route('products.edit', $product) }}">
                                Editer
                            </a>

                            <a class="underline" href="{{ route('products.show', $product) }}">
                                Voir
                            </a>

                        </div>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="p-4">
                        Aucun produit
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="mt-4">
        {{ $products->links() }}
    </div>

</div>

@endsection

