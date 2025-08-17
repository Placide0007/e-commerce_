@extends('base')

@section('title', 'about page')

@vite(['resources/css/about.css'])

@section('content')

    {{-- section hero --}}
    
    <section id="hero">
        <h1 class="hero-title">À propos</h1>
        <p>Passionnés de technologie, je propose les meilleurs produits high-tech au meilleur prix.</p>
        <p>Qualité, innovation et service sont au cœur de ma mission.<a href="">plus d'info</a></p>
    </section>
@endsection
