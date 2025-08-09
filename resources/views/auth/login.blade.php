@extends('base')

@section('title', 'login page')

@vite(['resources/css/login.css'])

@section('content')
    <div class="form-container">

        <x-status/>
        
        <form action="{{ route('login') }}" method="post">

            @csrf
            <p class="form-title">Connexion</p>

            <x-input type="email" label="Adresse Email" name="email" id="email" />

            <x-input type="password" label="Mot de passe" name="password" id="password" />

            <x-button label="Se connecter" type="submit" class="btn-primary" />

            <div class="alternative-link">
                <p>Pas de compte?</p>
                <a href="{{ route('register') }}">Creer un compte</a>
            </div>

        </form>

    </div>
@endsection
