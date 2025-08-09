@extends('base')

@section('title', 'about page')

@vite(['resources/css/about.css'])

@section('content')

    {{-- section hero --}}
    
    <section id="hero">
        <h1 class="hero-title">À propos de nous</h1>
        <p>Passionnés de technologie, nous proposons les meilleurs produits high-tech au meilleur prix.</p>
        <p>Qualité, innovation et service sont au cœur de notre mission.<a href="">plus d'info</a></p>
    </section>
@endsection
