@extends('base')

@section('title', 'category list ')

@vite(['resources/css/category-list.css'])

@php
    $hideFooter = true;
@endphp

@section('content')
    <div class="container">

        <x-status/>

        <div class="tools-wrapper">
            <a class="btn-success new-category" href="{{ route('categories.create') }}">
                Ajouter une category
            </a>
            <form action="{{ route('categories.index') }}" method="GET">
                <x-input :withWrapper="false" type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par nom" />
                <x-button class="btn-success" type="submit" label="Recherche" />
            </form>
        </div>
        <table>

            <thead>
                <tr>
                    <th>Ordre</th>
                    <th>Nom de la categorie</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>

                        <td>{{ $category->category_name }}</td>

                        <td class="action-section">
                            <a class="btn-primary"
                                href="{{ isset($category) ? route('categories.edit', $category) : route('categories.store') }}">
                                {{ isset($category) ? 'Editer' : 'Ajouter' }}
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="post">
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
            {{ $categories->links('pagination::default') }}
        </div>
    </div>

@endsection
