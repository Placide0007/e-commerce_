@extends('layouts.admin')

@section('title', 'Categories|Admin')

@section('content')

<div class="w-full">

    <div class="p-2 rounded flex justify-end mb-2">

        <button class="bg-white text-slate-900 p-1 cursor-pointer">
            + Nouveau Categorie
        </button>

    </div>

    <table class="w-full text-center overflow-hidden">

        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="border-r border-slate-700 p-2">Numero</th>
                <th class="border-r border-slate-700 p-2">Nom</th>
                <th class="border-r border-slate-700 p-2">Produit</th>
                <th class="border-r border-slate-700 p-2">Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($categories as $category)

                <tr class="border border-slate-800 hover:bg-slate-700">

                    <td class="border p-1 border-slate-800">
                        {{ Str::ucfirst($category->id) }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ Str::ucfirst($category->name) }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ $category->products_count }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ ucfirst($category->created_at->translatedFormat('d F Y')) }}
                    </td>

                    <td class="p-1">

                        <div class="flex gap-5 justify-center items-center">

                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-500 text-white p-1 text-xs">
                                    Supprimer
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="4" class="p-4">
                        Aucune catégorie
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="mt-5 flex justify-center">
        {{ $categories->links() }}
    </div>

</div>

@endsection

