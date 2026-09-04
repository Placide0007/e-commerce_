@extends('layouts.admin')

@section('title', 'Categories|Admin')

@section('content')

<div class="w-full">

    <div class="p-2 rounded flex justify-end mb-2">
        <button class="bg-white  text-slate-900 p-1 cursor-pointer" > + Nouveau Categorie</button>
    </div>

    <table class="w-full text-center   overflow-hidden">

        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="border-r  border-slate-700 p-2">Nom</th>
                <th class="border-r border-slate-700 p-2">Produit</th>
                <th class="border-r border-slate-700 p-2">Date</th>
                <th class="">Actions</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border border-slate-800 hover:bg-slate-700">

                <td class="border p-1 border-slate-800 ">
                    Fruits
                </td>

                <td class="border p-1 border-slate-800 ">
                    54343
                </td>

                <td class="border p-1 border-slate-800 ">
                    12 Fev 2026
                </td>

                <td class="p-1">
                    <div class="flex gap-5 justify-center items-center" >
                        <button class="bg-red-500 text-white p-1 text-xs " >Supprimer</button>
                    </div>
                </td>

            </tr>
        </tbody>

    </table>

</div>

@endsection
