@extends('layouts.base')

@section('title', 'Cart|Client')

@section('content')

<div class="w-full px-30 py-10">

    <table class="w-full text-center   overflow-hidden">

        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="border-r  border-slate-700 p-2">Nom</th>
                <th class="border-r  border-slate-700 p-2">Image</th>
                <th class="border-r border-slate-700 p-2">Prix(Ar)</th>
                <th class="border-r border-slate-700 p-2">Quantite</th>
                <th class="border-r border-slate-700 p-2">Total</th>
                <th class="">Actions</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border border-slate-200 bg-slate-100">

                <td class="border p-1 border-slate-200 ">
                    Pomme de terre
                </td>

                <td class="border flex justify-center items-center p-1 border-slate-200 ">
                    <a href="{{ asset('images/product-10.jpg') }}">
                        <img src="{{ asset('images/product-10.jpg') }}" width="50" height="50" alt="">
                    </a>
                </td>

                <td class="border p-1 border-slate-200 ">
                    400
                </td>

                <td class="border p-1 text-xs border-slate-200 ">
                    <input placeholder="Ex:20" class="bg-white p-2" type="number" name="" id="">
                </td>

                <td class="border p-1 text-xs border-slate-200 ">
                    <button  class="  p-1 rounded-4xl" >40000</button>
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
