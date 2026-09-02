@extends('layouts.base')
@section('title', 'Home page')
@section('content')
    <div class="hero-section px-10 py-3 bg-slate-50">

        {{-- section de recherche  --}}

        <div class="flex justify-end items-center">
            
            <div class="flex justify-center py-5">
                
                <input class="border p-1 bg-white border-slate-300" placeholder="Recherche..." type="text" name="">

                <button class="text-xs p-1 bg-slate-800 text-gray-300">Recherche</button>

            </div>

        </div>

        <div>

            <p class="text-3xl underline font-semibold py-2">Produits recents</p>

            <div class="grid grid-cols-4 py-5 gap-5">

                <div class="text-slate-800 shadow-xs border border-slate-300 bg-white rounded">

                    <img class="h-auto w-full object-cover" src="{{ asset('images/legume.jpg') }}" alt="">

                    <div class="flex flex-col gap-1 text-end p-4">

                        <p class="text">Rakoto</p>
                        
                        <div class="flex justify-end items-center gap-3">

                            <h2 class="font-semibold text-xs text-red-500 line-through">5.400.000 Ar</h2>

                            <h2 class="font-semibold text-xl">2.400.000 Ar</h2>

                        </div>

                        <h2 class="text-xs text-red-500">20 disponible(s)</h2>

                        <button class="bg-slate-800 text-gray-300 text-xs p-2">Plus de details</button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- produits par categories section  --}}

    <div class="py-3 px-10">

        <p class="text-3xl underline font-semibold py-10">Par categories</p>

        <div class="flex gap-3">

            <button class="bg-slate-800 text-xs p-1 rounded text-white">Tous</button>

            <button class="border text-xs border-slate-200 p-1">Legumes</button>

            <button class="border text-xs border-slate-200 p-1">Fruits</button>

        </div>

        <div class="grid grid-cols-4 py-5 gap-5">

            <div class="text-slate-800 shadow-xs border border-slate-300 bg-white rounded">

                <img class="h-auto w-full object-cover" src="{{ asset('images/legume.jpg') }}" alt="">

                <div class="flex flex-col gap-1 text-end p-4">

                    <p class="text">Rakoto</p>

                    <div class="flex justify-end items-center gap-3">

                        <h2 class="font-semibold text-xs text-red-500 line-through">5.400.000 Ar</h2>

                        <h2 class="font-semibold text-xl">2.400.000 Ar</h2>

                    </div>

                    <h2 class="text-xs text-red-500">20 disponible(s)</h2>

                    <button class="bg-slate-800 text-gray-300 text-xs p-2">Plus de details</button>

                </div>

            </div>

        </div>

    </div>

@endsection
