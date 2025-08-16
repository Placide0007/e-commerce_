@extends('base')

@section('title', 'create category')

@vite(['resources/css/category-form.css'])

@section('content')

    <div class="category-form-container">

        <x-status/>
        
        <form action="{{ isset($category) ? route('categories.update', $category ) : route('categories.store') }}" method="post">

            @csrf

            @if (isset($category))
                @method('PUT')
            @endif

            <p class="form-title">{{ isset($category) ? 'Editer' : 'Ajouter' }} une categorie</p>

            <x-input 
                type="text" 
                label="Nom du category" 
                name="category_name" 
                id="category_name" 
                value="{{ old('category_name', isset($category) ? $category->category_name : '') }}"
            />

            <x-button type="submit" label="{{ isset($category) ? 'Editer' : 'Ajouter' }}" class="btn-primary" />
        
        </form>

    </div>
@endsection
