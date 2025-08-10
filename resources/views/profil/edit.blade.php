@extends('base')

@section('title', 'edit profil')

@vite(['resources/css/user-edit.css'])

@section('content')

    <x-status />

    <div class="edit-form-container">

        <form action="{{ route('profils.update', $user) }}" method="post">

            @csrf

            @method('PUT')

            <p class="form-title">Editer les informations</p>

            <x-input type="text" label="Nom" name="name" id="name" :value="old('name', $user->name)" />

            <x-input type="text" label="Prenom(s)" name="first_name" id="first_name" :value="old('first_name', $user->first_name)" />

            <x-button type="submit" class="edit-btn btn-primary" label="Editer" />

        </form>

    </div>
@endsection
