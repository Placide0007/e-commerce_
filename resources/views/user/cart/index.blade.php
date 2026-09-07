@extends('layouts.base')

@section('title', 'Cart|Client')

@section('content')

<div class="w-full px-30 py-10">

    <table class="w-full text-center overflow-hidden">

        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="border-r border-slate-700 p-2">Nom</th>
                <th class="border-r border-slate-700 p-2">Image</th>
                <th class="border-r border-slate-700 p-2">Prix(Ar)</th>
                <th class="border-r border-slate-700 p-2">Quantite</th>
                <th class="border-r border-slate-700 p-2">Total</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($items as $item)

                <tr class="border border-slate-200 bg-slate-100">

                    <td class="border p-1 border-slate-200">
                        {{ Str::ucfirst($item['product']->name) }}
                    </td>

                    <td class="border flex justify-center items-center p-1 border-slate-200">
                        <a href="{{ asset('images/products/' . $item['product']->image) }}">
                            <img class="h-15 w-15 object-cover rounded" src="{{ asset('images/products/' . $item['product']->image) }}" alt="">
                        </a>
                    </td>

                    <td class="border p-1 border-slate-200">
                        {{ number_format($item['product']->price, 0, ',', '.') }} Ar
                    </td>

                    <td class="border p-1 text-xs border-slate-200">

                        <button class="text-xl px-1 cursor-pointer bg-slate-800 text-white" type="button" onclick="changeQty(this, -1)">
                            −
                        </button>

                        <input class="bg-white p-2 w-12 text-center" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" data-price="{{ $item['product']->price }}" data-product="{{ $item['product']->id }}" oninput="updateTotal(this); updateCart(this)">

                        <button class="text-xl px-1 cursor-pointer bg-slate-800 text-white" type="button" onclick="changeQty(this, 1)">
                            +
                        </button>

                    </td>

                    <td class="border p-1 text-xs border-slate-200">

                        <button class="p-1 rounded-4xl total">
                            {{ number_format($item['product']->price * $item['quantity'], 0, ',', '.') }} Ar
                        </button>

                    </td>

                    <td class="p-1">

                        <div class="flex gap-5 justify-center items-center">

                            <form action="{{ route('cart.remove', $item['product']) }}" method="POST">

                                @csrf

                                @method('DELETE')

                                <button class="bg-red-500 cursor-pointer text-white p-1 text-xs">
                                    Supprimer
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="p-4">
                        Votre panier est vide
                    </td>
                </tr>

            @endforelse

        </tbody>

        <tfoot>

            @if(count($items))

                <tr>

                    <td colspan="4" class="p-3 text-right font-semibold">
                        Total :
                    </td>

                    <td colspan="2" class="p-3 text-left font-bold">
                        <span id="grand-total">0 Ar</span>
                    </td>

                </tr>

            @endif

        </tfoot>

    </table>

    <a href="{{ route('checkout') }}" class="bg-slate-800 text-gray-100 p-2 text-sm">
        Commander
    </a>

</div>


<script>

    function changeQty(btn, value) {

        const input = btn.parentElement.querySelector('input');

        input.value = Math.max(1, +input.value + value);

        updateTotal(input);

        updateCart(input);
    }

    function updateTotal(input) {

        const price = Math.round(input.dataset.price);
        const quantity = +input.value;
        const total = price * quantity;

        input.closest('tr').querySelector('.total').textContent = total.toLocaleString('fr-FR') + ' Ar';

        updateGrandTotal();
    }

    function updateGrandTotal() {

        let total = 0;

        document.querySelectorAll('tbody tr').forEach(row => {

            const input = row.querySelector('input');

            if (!input) return;

            const price = Math.round(input.dataset.price);
            const quantity = +input.value;

            total += price * quantity;
        });

        document.querySelector('#grand-total').textContent =
            total.toLocaleString('fr-FR') + ' Ar';
    }

    function updateCart(input) {

        fetch(`/user/cart/${input.dataset.product}`, {

            method: 'PATCH',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },

            body: JSON.stringify({
                quantity: input.value
            })

        });

    }

    updateGrandTotal();

</script>

@endsection

