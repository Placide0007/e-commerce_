@extends('layouts.admin')

@section('title', 'Orders|Admin')

@section('content')

<div>

    <div class="flex justify-between items-center px-10 mb-5">

        <div>

            <p class="underline">Listes des commandes</p>

            <p class="text-xs text-slate-500 mt-1">
                Stock global :
                <span class="font-semibold text-slate-700">
                    {{ $stockGlobal }}
                </span>
            </p>

        </div>

        <div class="flex justify-center py-5">

            <input class="border text-slate-900 p-1 bg-white border-slate-300" placeholder="Nom du client" type="text" name="search">

            <button class="text-xs p-1 bg-slate-800 text-gray-300">
                Recherche
            </button>

        </div>

    </div>

    <div class="px-10 flex flex-col gap-5">

        @forelse ($orders as $order)

            <div class="flex justify-between items-center py-2 px-5 bg-gray-100 text-slate-900 border-slate-300 border rounded">

                <div class="flex flex-col gap-1">

                    <p class="text-slate-800 font-semibold">
                        {{ Str::ucfirst($order->user->name) }}
                    </p>

                    <p class="font-extrabold">
                        {{ number_format($order->total, 0, ',', '.') }} Ar
                    </p>

                    <p class="text-[12px] font-semibold
                        {{ $order->status === 'pending' ? 'text-yellow-600' : 'text-green-600' }}">

                        {{ ucfirst($order->status) }}

                    </p>

                </div>

                <a class="font-semibold underline" href="{{ route('orders.show', $order) }}">
                    Voir
                </a>

            </div>

        @empty

            <div class="text-center py-10 text-slate-500">
                Aucune commande.
            </div>

        @endforelse

    </div>

</div>

@endsection

