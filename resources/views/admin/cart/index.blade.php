@extends('base')

@section('title', 'Panier')

@php
    $hideFooter = true;
@endphp

@vite(['resources/css/cart.css'])

@section('content')
    <div class="big-container">

        @if (count($cart) > 0)

            @php
                $total = 0;
                foreach ($cart as $item) {
                    $total += $item['product_price'] * $item['quantity'];
                }
            @endphp

            <x-status />

            <table border="1">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $item['product_image']) }}" width="50"
                                    alt="{{ $item['product_name'] }}">
                            </td>
                            <td>
                                {{ $item['product_name'] }}
                            </td>
                            <td>
                                {{ number_format($item['product_price'], 0, ',', ' ') }} Ar
                            </td>
                            <td>
                                {{ $item['quantity'] }}
                            </td>
                            <td>
                                {{ number_format($item['product_price'] * $item['quantity'], 0, ',', ' ') }} Ar
                            </td>
                            <td class="form-container">
                                <form class="update-quantity" action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="tools-container">
                                        <label for="quantity">Quantite a retirer</label>
                                        <x-input class="quantity" type="number" required name="quantity" min="1"
                                            max="{{ $item['quantity'] }}" />
                                        <button type="submit" class="btn-primary">Retirer</button>
                                    </div>
                                </form>

                                <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="totals">
                        <td colspan="5" class="text-total">Total</td>
                        <td class="total" colspan="1">{{ number_format($total, 0, ',', ' ') }} Ar</td>
                    </tr>
                </tfoot>
            </table>

            <div class="choice">
                <a href="{{ route('order') }}" class="btn-success">Commander</a>
                <a href="{{ route('cart.annuler') }}" class="btn-danger">Annuler</a>
            </div>

        @else
            <p class="is-empty">Votre panier est vide.</p>
        @endif
    </div>
@endsection
