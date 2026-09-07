@extends('layouts.base')

@section('title', 'Commande confirmée|Client')

@section('content')

<div class="w-full px-30 py-10 text-center">

    <h1 class="text-2xl font-bold mb-4">Commande confirmée</h1>

    <p class="text-slate-600 mb-2">Votre commande a été enregistrée avec succès.</p>

    <p class="text-lg font-bold mb-6">{{ number_format($order->total, 0, ',', '.') }} Ar</p>

    <a href="{{ route('user.products') }}" class="bg-slate-800 text-white p-2 text-sm">Continuer mes achats</a>

</div>

@endsection

