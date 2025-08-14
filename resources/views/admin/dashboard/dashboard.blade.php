@extends('base')

@section('title', 'admin dashboard')

@vite(['resources/css/dashboard.css', 'resources/js/aside.js'])

@section('content')
    <div class="big-container">
        @include('layouts.sidebar')
        <div class="container">
            <section id="hero">
                <p class="hero-title">Resume Global</p>
                <div class="card-container">
                    <div class="card user-card">
                        <p>Utilisateur</p>
                        <i class="bi bi-people"></i>
                        <p class="count">{{ $users->count() }}</p>
                    </div>

                    <div class="card category-card">
                        <p>Categories</p>
                        <i class="bi bi-tag"></i>
                        <p class="count">{{ $categories->count() }}</p>
                    </div>

                    <div class="card other-card">
                        <p>Produits</p>
                        <i class="bi bi-cart"></i>
                        <p class="count">{{ $products->count() }}</p>
                    </div>

                </div>
            </section>
            <section id="chart-section">
                <p class="chart-section-title">Données analytiques</p>
                <div class="chart-container">
                    <div class="chart-bar">
                        {!! $user_chart->container() !!}
                    </div>

                    <div class="chart-donut">
                        {!! $category_chart->container() !!}
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

@push('scripts')
    {!! $user_chart->script() !!}
    {!! $product_chart->script() !!}
    {!! $category_chart->script() !!}
@endpush
