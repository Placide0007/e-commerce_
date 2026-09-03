@extends('layouts.base')

@section('title', 'Home page')

@section('content')

{{-- hero de recherche  --}}
    <div class="hero-section px-10 py-3 bg-slate-50">

        <div class="flex justify-end items-center">
            
            <div class="flex justify-center py-5">
                
                <input class="border p-1 bg-white border-slate-300" placeholder="Recherche..." type="text" name="">

                <button class="text-xs p-1 bg-slate-800 text-gray-300">Recherche</button>

            </div>

        </div>

        {{-- produits recent  --}}

        <div>

            <p class="text-3xl underline font-semibold py-2">Produits recent</p>

            <div class="grid grid-cols-4 py-5 gap-5">

                <div class="text-slate-800  shadow-xs border border-slate-300 bg-white rounded p-1">

                    <div class="group relative">

                        <img class="h-auto w-full object-cover rounded" src="{{ asset('images/legume.jpg') }}" alt="">

                        <div class="opacity-0 flex flex-col gap-2 absolute inset-0 transition duration-300 group-hover:opacity-100 bg-gray/10 backdrop-blur-sm items-center justify-center">

                            <div class="flex flex-col gap-2 justify-center items-center  shadow-sm">

                                <input type="number"  value="1" min="1" class="w-28 bg-white rounded p-2 text-center text-sm border-0 focus:outline-none">

                            </div>

                            <button class="bg-slate-800 text-[11px] text-white p-1 rounded cursor-pointer">Ajouter au Panier</button>

                        </div>

                        <div class="flex flex-col gap-1 text-end px-6">
                            <p>Rakoto</p>
                            <h2 class="font-semibold text-xl">2.400.000 Ar</h2>
                            <h2 class="text-xs text-red-500">20 disponible(s)</h2>
                        </div>

                    </div>

                    <div class="w-full flex p-3">
                        <a class="bg-slate-800 text-center cursor-pointer w-full text-gray-300 text-xs p-2" href="">Plus de details</a>
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- section pour promotion  --}}

    <div class="py-3 px-10">

        <p class="text-3xl underline font-semibold py-2">Promotions</p>

        <div class="grid grid-cols-4 py-5 gap-5">

            <div class="text-slate-800  shadow-xs border border-slate-300 bg-white rounded p-1">

                <div class="group relative">

                    <img class="h-auto w-full object-cover rounded" src="{{ asset('images/legume.jpg') }}" alt="">

                    <div class="opacity-0 flex flex-col gap-2 absolute inset-0 transition duration-300 group-hover:opacity-100 bg-gray/10 backdrop-blur-sm items-center justify-center">

                        <div class="flex flex-col gap-2 justify-center items-center  shadow-sm">

                            <input type="number"  value="1" min="1" class="w-28 bg-white rounded p-2 text-center text-sm border-0 focus:outline-none">

                        </div>

                        <button class="bg-slate-800 text-[11px] text-white p-1 rounded cursor-pointer">Ajouter au Panier</button>

                    </div>

                    <div class="flex flex-col gap-1 text-end px-6">
                        <p>Rakoto</p>
                        <h2 class="font-semibold text-xl">2.400.000 Ar</h2>
                        <h2 class="text-xs text-red-500">20 disponible(s)</h2>
                    </div>

                </div>

                <div class="w-full flex p-3">
                    <a class="bg-slate-800 text-center cursor-pointer w-full text-gray-300 text-xs p-2" href="">Plus de details</a>
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

        <div class="grid grid-cols-4 py-5 gap-5 z-0">

            <div class="text-slate-800  shadow-xs border border-slate-300 bg-white rounded p-1">

                <div class="group relative">

                    <img class="h-auto w-full object-cover rounded" src="{{ asset('images/legume.jpg') }}" alt="">

                    <div class="opacity-0 flex flex-col gap-2 absolute inset-0 transition duration-300 group-hover:opacity-100 bg-gray/10 backdrop-blur-sm items-center justify-center">

                        <div class="flex flex-col gap-2 justify-center items-center  shadow-sm">

                            <input type="number"  value="1" min="1" class="w-28 bg-white rounded p-2 text-center text-sm border-0 focus:outline-none">

                        </div>

                        <button class="bg-slate-800 text-[11px] text-white p-1 rounded cursor-pointer">Ajouter au Panier</button>

                    </div>

                    <div class="flex flex-col gap-1 text-end px-6">
                        <p>Rakoto</p>
                        <h2 class="font-semibold text-xl">2.400.000 Ar</h2>
                        <h2 class="text-xs text-red-500">20 disponible(s)</h2>
                    </div>

                </div>

                <div class="w-full flex p-3">
                    <a class="bg-slate-800 text-center cursor-pointer w-full text-gray-300 text-xs p-2" href="">Plus de details</a>
                </div>

            </div>

        </div>

    </div>

@endsection
