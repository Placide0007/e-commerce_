@php
    use Illuminate\Support\Str;
@endphp

@extends('base')

@section('title', 'product list ')

@vite(['resources/css/product-list.css'])

@php
    $hideFooter = true;
@endphp

@section('content')

    <div class="container">
        
        <x-status/>

        <a class="btn-success new-category" href="{{ route('products.create') }}">Ajouter un produit</a>

        <table>
            <thead>
                <tr>
                    <th>Ordre</th>
                    <th>Nom du prdouit</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>

                        <td>{{ $product->product_name }}</td>

                        <td>{{ $product->product_price }}</td>

                        <td>{{ $product->product_stock }}</td>

                        <td>{{ Str::limit($product->product_description,40, '...') }}</td>

                        <td>{{ $product->category->category_name }}</td>

                        <td>
                            <a href="{{ asset('images/' . $product->product_image) }}">
                                {{-- <img src="{{ asset('storage/' . $product->product_image) }}" alt="" width="20"> --}}
                                <img src="{{ asset('images/' . $product->product_image) }}" width="20">
                            </a>
                        </td>

                        <td class="action-section">

                            <a class="btn-primary" href="{{ route('products.edit', $product) }}"">Editer</a>

                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="categories-list">
            {{ $products->links('pagination::default') }}
        </div>
    </div>
@endsection
