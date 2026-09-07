@extends('layouts.base')

@section('title', 'Checkout|Client')

@section('content')

<div class="w-full px-30 py-10">


<h1 class="text-2xl font-bold mb-6">
    Confirmation de commande
</h1>

<div class="grid grid-cols-2 gap-10">

    <div>

        <h2 class="text-lg font-semibold mb-4">
            Informations client
        </h2>

        <form class="flex flex-col gap-3" action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div>
                <input type="text" value="{{ auth()->user()->name }}" class="bg-white w-50 border border-slate-300 p-2" readonly>
            </div>

            <button type="submit" class="w-25 bg-slate-800 text-sm p-2 text-white">
                Confirmer
            </button>

        </form>

    </div>

    <div>

        <h2 class="text underline text-xl font-semibold mb-4">
            Aperçu de votre commande
        </h2>

        <table class="w-full text-center">

            <thead class="bg-slate-800 text-white">
                <tr>
                    <th class="p-2">Produit</th>
                    <th class="p-2">Prix</th>
                    <th class="p-2">Qté</th>
                    <th class="p-2">Total</th>
                </tr>
            </thead>

            <tbody>

                @php
                    $grandTotal = 0;
                @endphp

                @foreach ($items as $item)

                    @php
                        $total = $item['product']->price * $item['quantity'];
                        $grandTotal += $total;
                    @endphp

                    <tr class="border border-slate-300 bg-slate-100">

                        <td class="p-2">
                            {{ Str::ucfirst($item['product']->name) }}
                        </td>

                        <td class="p-2">
                            {{ number_format($item['product']->price, 0, ',', '.') }} Ar
                        </td>

                        <td class="p-2">
                            {{ $item['quantity'] }}
                        </td>

                        <td class="p-2 font-semibold">
                            {{ number_format($total, 0, ',', '.') }} Ar
                        </td>

                    </tr>

                @endforeach

            </tbody>

            <tfoot>

                <tr>
                    <td colspan="3" class="p-3 text-right font-semibold">
                        Total :
                    </td>

                    <td class="p-3 font-bold text-left">
                        {{ number_format($grandTotal, 0, ',', '.') }} Ar
                    </td>
                </tr>

            </tfoot>

        </table>

    </div>

</div>


</div>

@endsection
