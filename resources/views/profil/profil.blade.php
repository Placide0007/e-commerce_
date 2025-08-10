@extends('base')

@section('title', 'profil page')

@vite(['resources/css/profil.css'])

@section('content')
    <div class="form-container">

        <x-status/>
        
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom(s)</th>
                        <th>Adresse Email</th>
                        <th>Role</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{  Auth::user()->name }}
                        </td>
                        <td>
                            {{ Auth::user()->first_name }}
                        </td>
                        <td>
                            {{ Auth::user()->email }}
                        </td>
                        <td>
                            {{ Auth::user()->role }}
                        </td>
                        <td class="action-section">
                            <a class="btn-primary" href="{{ route('profils.edit', Auth::user()->id) }}">
                                Editer
                            </a>
                            
                            <form action="{{ route('profils.destroy', Auth::user()->id ) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
@endsection
