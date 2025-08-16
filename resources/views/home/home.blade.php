@extends('base')

@section('title', 'Accueil')

@vite(['resources/css/home.css'])

@section('content')

    <x-status/>

    <section id="hero" style="width: 100%">
        <p class="hero-title">Upgradez votre PC</p>
        <p class="hero-slogan">Puissance. Style. Rapidité.</p>
    </section>

    <section id="jumbotron">
        <form action="{{ route('home') }}" method="GET">
            <div class="input-search">
                <x-input value="{{ request('search') }}" name="search" :withWrapper="false" type="search"
                    placeholder="nom du produit.." />
                <x-button class="btn-success btn-search" type="submit" label="recherche" />
            </div>
        </form>

        <div class="product-navbar">
            <div class="nav-link">
                @foreach ($categories as $category)
                    <x-category-links :category=$category />
                @endforeach
            </div>
        </div>

        <div class="product-container" id="product-list">
            @forelse ($products as $product)
                <x-card-product :product=$product />
            @empty
                <p class="nothing">Aucun Produit</p>
            @endforelse
        </div>

        <div class="products-pagination">
            {{ $products->links('pagination::default') }}
        </div>
        
    </section>
@endsection
