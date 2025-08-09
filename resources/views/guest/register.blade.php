@extends('base')

@section('title', 'register page')

@vite(['resources/css/register.css'])

@section('content')
    <div class="form-container">

        <form action="{{ route('register') }}" method="post">

            @csrf
            
            <p class="form-title">Inscription</p>

            <x-input type="text" label="Nom" name="name" id="name" />

            <x-input type="text" label="Prenom(s)" name="first_name" id="first_name" />

            <x-input type="email" label="email" name="email" id="email" />

            <x-input type="password" label="password" name="password" id="password" />

            <x-button type="submit" class="btn-primary" label="S'inscrire" />

            <div class="alternative-link">
                <p>A deja un compte?</p>
                <a href="{{ route('login') }}">Se connecter</a>
            </div>

        </form>

    </div>
@endsection
