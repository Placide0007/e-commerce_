@extends('layouts.admin')

@section('title', 'Order #'.$order->id.'|Admin')

@section('content')

<div class="px-10 py-5">

    <div class="flex justify-between items-center mb-5">

        <div>
            <p class="text-xl font-bold underline">Commande {{ $order->id }}</p>
            <p class="text-xs text-slate-500">{{ $order->created_at->format('d/m/Y à H:i') }}</p>
        </div>

        <a href="{{ route('orders') }}" class="text-sm underline">Retour</a>

    </div>

    <div class="grid grid-cols-2 gap-5 mb-5">

        <div class="border border-slate-700 rounded p-5">

            <p class="text-sm font-bold mb-3">Client</p>

            <p class="font-semibold">{{ Str::ucfirst($order->user->name) }}</p>

            <p class="text-sm text-slate-500">{{ $order->user->email }}</p>

        </div>

        <div class="border border-slate-700 rounded p-5">

            <p class="text-sm font-bold mb-3">Commande</p>

            <p class="text-sm mb-3">
                Statut :
                <span class="font-semibold {{ $order->status === 'pending' ? 'text-yellow-600' : 'text-green-600' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>

            <p class="text-sm mb-4">Date : {{ $order->created_at->format('d/m/Y') }}</p>

            @if($order->status === 'pending')

                <form action="{{ route('orders.confirm', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-green-600 text-white text-sm px-3 py-2 rounded">
                        Confirmer la commande
                    </button>
                </form>

            @else

                <a href="{{ route('orders.pdf', $order) }}" class="inline-block bg-slate-800 text-white text-sm px-3 py-2 rounded">
                    Télécharger le PDF
                </a>

            @endif

        </div>

    </div>

    <div class="border border-slate-700 rounded overflow-hidden">

        <div class="grid grid-cols-5 bg-slate-800 text-white text-sm">
            <div class="p-3">Produit</div>
            <div class="p-3">Prix</div>
            <div class="p-3">Quantité</div>
            <div class="p-3">Sous-total</div>
            <div class="p-3">Statut</div>
        </div>

        @foreach ($order->items as $item)

            <div class="grid grid-cols-5 border-t border-slate-800 text-sm">

                <div class="p-3 font-semibold">
                    {{ Str::ucfirst($item->product->name) }}
                </div>

                <div class="p-3">
                    {{ number_format($item->price, 0, ',', '.') }} Ar
                </div>

                <div class="p-3">
                    {{ $item->quantity }}
                </div>

                <div class="p-3 font-semibold">
                    {{ number_format($item->subtotal, 0, ',', '.') }} Ar
                </div>

                <div class="p-3">
                    <span class="font-semibold {{ $order->status === 'pending' ? 'text-yellow-600' : 'text-green-600' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

            </div>

        @endforeach

        <div class="flex justify-end border-t border-slate-700 p-4">

            <p class="font-bold text-lg">
                Total : {{ number_format($order->total, 0, ',', '.') }} Ar
            </p>

        </div>

    </div>

</div>

@endsection

