@extends('base')

@section('title', 'users list ')

@vite(['resources/css/user-list.css'])

@php
    $hideFooter = true;
@endphp

@section('content')
    <div class="container">
        <x-status/>
        @if ($users->isEmpty())
            <p class="is-empty">Aucun contenu</p>
        @else
            <div class="search-wrapper">
                <form action="{{ route('users.index') }}" method="GET">
                    <x-input :withWrapper="false" type="text" name="search" value="{{ request('search') }}"
                        placeholder="Rechercher par nom..."/>
                    <x-button class="btn-success" type="submit" label="Recherche" />
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Nom</th>
                        <th>Prenom(s)</th>
                        <th>Adresse Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->first_name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td class="action-section">
                                <a class="btn-primary" href="{{ route('users.edit', $user) }}">Editer</a>
                                <form action="{{ route('users.destroy', $user) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div>
            {{ $users->links('pagination::default') }}
        </div>
    </div>
@endsection
