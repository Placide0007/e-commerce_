@extends('base')

@section('title', 'edit user')

@vite(['resources/css/user-edit.css'])

@section('content')
    <div class="edit-form-container">
        <form action="{{ route('users.update', $user ) }}" method="post">
            @csrf
            @method('PUT')  
            <p class="form-title">Editer un utilisateur</p>

            <x-input type="text" label="Nom" name="name" id="name" :value="old('name', $user->name)"/>

            <x-input type="text" label="Prenom(s)" name="first_name" id="first_name" :value="old('first_name', $user->first_name )" />

            <x-input type="email" label="email" name="email" id="email" :value="old('email', $user->email)"/>

            <x-input type="text" label="role" name="role" id="role" :value="old('role', $user->role)"/>

            <x-button type="submit" class="edit-btn btn-primary" label="Editer" />

        </form>

    </div>
@endsection
