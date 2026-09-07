
@extends('layouts.base')

@section('title', 'Profile page')

@section('content')

<div id="profile" class="px-5 sm:px-8 md:px-12 lg:px-20 xl:px-25 py-6 sm:py-10 bg-gray-50">

    <div class="flex flex-col sm:flex-row justify-between items-center sm:items-start border border-slate-200 bg-white rounded-xl p-5 sm:p-8 lg:p-12 xl:p-15 shadow-xs">

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-center">

            <div class="w-28 h-28 sm:w-32 sm:h-32 lg:w-35 lg:h-35 rounded-full border border-slate-200 bg-slate-50 flex justify-center items-center overflow-hidden">
                <img class="w-16 h-16 sm:w-20 sm:h-20" src="{{ asset('icons/profile.svg') }}"alt="Profile">
            </div>

            <div class="flex flex-col gap-2 items-center sm:items-start text-center sm:text-left">

                <h1 class="text-xl sm:text-2xl font-bold break-all text-slate-800">
                    {{ Str::ucfirst(Auth::user()->name) }}
                </h1>

                <span class="text-xs text-slate-400 break-all">
                    {{ Auth::user()->email }}
                </span>

                <button class="text-xs bg-slate-600  text-white px-2 py-1 rounded">
                    {{ Str::ucfirst(Auth::user()->role) }}
                </button>

            </div>

        </div>

    </div>

</div>


<div class="px-5 sm:px-8 md:px-12 lg:px-20 xl:px-25 py-6 sm:py-10">

    <div class="flex justify-between items-center border-b border-slate-200 pb-3">

        <p class="text-xl font-bold underline text-slate-800">
            Historiques
        </p>

        <span class="text-xs text-slate-400">
            Mes commandes
        </span>

    </div>

    <div class="mt-5 border border-slate-200 rounded-lg bg-white">

        <div class="grid grid-cols-4 bg-slate-800 text-white text-xs sm:text-sm">
            <div class="p-2">Commande</div>
            <div class="p-2">Date</div>
            <div class="p-2">Total</div>
            <div class="p-2 text-center">Statut</div>
        </div>

        @forelse ($orders as $order)

            <div class="grid grid-cols-4 border-t border-slate-200 text-xs sm:text-sm overflow-y-auto">

                <div class="p-3">
                    {{ $order->id }}
                </div>

                <div class="p-3">
                    {{ $order->created_at->format('d/m/Y') }}
                </div>

                <div class="p-3 font-semibold">
                    {{ number_format($order->total, 0, ',', '.') }} Ar
                </div>

                <div class="p-3 text-center">
                    <span class="px-2 py-1 rounded text-xs
                        {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

            </div>

        @empty

            <div class="p-10 flex flex-col justify-center items-center gap-2">
                <h2 class="text-sm font-semibold text-slate-500">
                    Aucune commande
                </h2>
            </div>

        @endforelse

    </div>

</div>

@endsection

