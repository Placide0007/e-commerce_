@extends('base')

@section('title', 'register page')

@vite(['resources/css/product-form.css'])

@section('content')
    <div class="form-container">

        {{-- @dd($product) --}}

        @php
            $route = isset($product) ? route('products.update', $product) : route('products.store');
        @endphp

        <form action="{{ $route }}" method="post" enctype="multipart/form-data">

            @csrf

            @if (isset($product))
                @method('PUT')
            @endif

            <p class="form-title">{{ isset($product) ? 'Editer' : 'Ajouter' }} un Produit</p>

            <x-input 
            type="text" 
            label="Nom" 
            name="product_name" 
            id="product_name"
            value="{{ isset($product) ? $product->product_name : old('product_name') }}" 
            />

            <x-input 
            type="text" 
            label="Prix" 
            name="product_price" 
            id="product_price"
            value="{{ isset($product) ? $product->product_price : old('product_price') }}" 
            />

            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>


            <div>
                @error('product_category')
                    {{ $message }}
                @enderror
            </div>

            <x-text-area 
            label="Description" 
            id="product_description" 
            name="product_description"
            value="{{ isset($product) ? $product->product_description : old('product_description') }}" 
            />

            <x-input 
            type="text" 
            label="Stock" 
            name="product_stock" 
            id="product_stock"
            value="{{ isset($product) ? $product->product_stock : old('product_stock') }}" 
            />

            <x-input 
            type="file" 
            label="Image" 
            name="product_image" 
            id="product_image" 
            />

            <x-button type="submit" class="btn-primary" label="{{ isset($product) ? 'Editer' : 'Ajouter' }}" />

        </form>

    </div>
@endsection
