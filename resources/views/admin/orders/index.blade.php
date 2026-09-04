@extends('layouts.admin')

@section('title', 'Orders|Admin')

@section('content')

    <div>
        <div class="flex justify-between items-center px-10 mb-5">

            <p class="underline" >Listes des commandes</p>

            <div class="flex justify-center py-5">

                <input class="border text-slate-900 p-1 bg-white border-slate-300" placeholder="Nom du client" type="text" name="">

                <button class="text-xs p-1 bg-slate-800 text-gray-300">Recherche</button>

            </div>

        </div>

        <div class="px-10 flex flex-col gap-5">
            <div class="flex justify-between items-center py-2 px-5 bg-gray-100 text-slate-900 border-slate-300 border rounded">
                <div class="flex flex-col gap-1">
                    <div>
                        <p class="text-slate-800 font-semibold">Rafalimanana</p>
                        <p class="font-extrabold">5.650.000 Ar</p>
                    </div>
                    <p class=" pr-0  text-[8px] font-bold text-red-600" >40 disponible(s)</p>
                </div>
                <a class="font-bold underline" href="">Voir</a>
            </div>

            <div class="flex justify-between items-center py-2 px-5 bg-gray-100 text-slate-900 border-slate-300 border rounded">
                <div class="flex flex-col gap-1">
                    <div>
                        <p class="text-slate-800 font-semibold">Rasoanandrasana</p>
                        <p class="font-extrabold">5.650.000 Ar</p>
                    </div>
                    <p class=" pr-0  text-[8px] font-bold text-red-600" >40 disponible(s)</p>
                </div>
                <a class="font-bold underline" href="">Voir</a>
            </div>
        </div>
    </div>


@endsection
