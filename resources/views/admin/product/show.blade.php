@extends('base')

@section('title', 'login page')

@vite(['resources/css/product-show.css'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <x-button class="btn-danger product-category" label="{{ $product->category->category_name }}" />
                <img src="{{ asset('images/' . $product->product_image) }}" alt="{{ $product->product_name }}">
            </div>

            <div class="card-body">
                <p class="product-description">{{ $product->product_description }}</p>
                <div class="btn-container">
                    <x-button class="btn-primary" label="stock {{ $product->product_stock }}" />
                    <x-button class="btn-danger" label="{{ $product->product_price }} Ar " />
                </div>
            </div>

            <div class="card-footer">
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label class="label-quantity" for="quantity">Quantité</label>
                    <x-input type="number" name="quantity" id="quantity" min="1"/>
                    <x-button class="btn-danger" label="Ajouter" />
                </form>
            </div>
        </div>
    </div>
@endsection
