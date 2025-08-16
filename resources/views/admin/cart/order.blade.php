@extends('base')

@section('title', 'Commande')

@vite(['resources/css/order.css'])

@section('content')
    <div class="container">
        <div class="order-form">
            <form action="{{ route('order.submit') }}" method="post">
                @csrf
                <h1>Vos informations</h1>
                <x-input type="text" label="Nom" name="name" />
                <x-input type="text" label="Prenom(s)" name="first_name" />
                <x-input type="text" label="Adresse de livraison" name="adresse"/>
                <x-input type="number" label="Téléphone" name="telephone" />
                <button type="submit" class="btn btn-primary">Passer la commande</button>
            </form>
        </div>

        <div class="order-summary">
            <h1>Liste des achats</h1>
            @if (isset($cartItems) && count($cartItems) > 0)
                <table border="1">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach ($cartItems as $item)
                            @php
                                $itemTotal = $item['product_price'] * $item['quantity'];
                                $grandTotal += $itemTotal;
                            @endphp
                            <tr>
                                <td>{{ $item['product_name'] }}</td>
                                <td>{{ number_format($item['product_price'], 0, ',', ' ') }} Ar</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($itemTotal, 0, ',', ' ') }} Ar</td>
                            </tr>
                        @endforeach
                        <tr class="total" >
                            <td>Total général :</td>
                            <td style="text-align: right;" colspan="5">{{ number_format($grandTotal, 0, ',', ' ') }} Ar</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p>Votre panier est vide.</p>
            @endif
        </div>
    </div>
@endsection
