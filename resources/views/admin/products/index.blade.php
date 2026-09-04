@extends('layouts.admin')

@section('title', 'Products|Admin')

@section('content')

<div class="w-full">

    <div class="p-2 rounded flex justify-end " >
        <button class="bg-white text-slate-900 p-1 cursor-pointer" > + Nouveau Produit</button>
    </div>

    <table class="w-full text-center   overflow-hidden">

        <thead class="bg-slate-700 text-white">
            <tr>
                <th class="border-r  border-slate-700 p-2">Nom</th>
                <th class="border-r border-slate-700 p-2">Categorie</th>
                <th class="border-r border-slate-700 p-2">Prix(Ar)</th>
                <th class="border-r border-slate-700 p-2">Quantite</th>
                <th class="">Actions</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border border-slate-800 hover:bg-slate-700">

                <td class="border p-1 border-slate-800 ">
                    Pomme de terre
                </td>

                <td class="border p-1 border-slate-800 ">
                    Legume
                </td>

                <td class="border p-1 border-slate-800 ">
                    200.000
                </td>

                <td class="border p-1 border-slate-800 ">
                    400
                </td>

                <td class="p-1">
                    <div class="flex gap-5 justify-center items-center">
                        <button class="bg-red-500 text-white p-1 text-xs ">Supprimer</button>
                        <a class="bg-green-500 text-white p-1 text-xs " href="">Editer</a>
                        <a class="underline" href="">Voir</a>
                    </div>
                </td>

            </tr>
            
        </tbody>

    </table>

</div>

@endsection
