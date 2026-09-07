@extends('layouts.admin')

@section('title', 'Users|Admin')

@section('content')

<div class="w-full">

    <p class="my-5 underline" >Liste des utilisateurs</p>

    <table class="w-full overflow-hidden">

        <thead class="bg-slate-800 text-white">
            <tr class="text-center">
                <th class="border-r border-slate-700 p-2">Numero</th>
                <th class="border-r border-slate-700 p-2">Nom</th>
                <th class="border-r border-slate-700 p-2">Email</th>
                <th class="border-r border-slate-700 p-2">Date de creation</th>
                <th class="border-r border-slate-700 p-2">Role</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($users as $user)

                <tr class="border border-slate-800 hover:bg-slate-700">

                    <td class="border p-1 text-center border-slate-800">
                        {{ $user->id }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ Str::ucfirst($user->name) }}
                    </td>

                    <td class="border p-1 border-slate-800">
                        {{ $user->email }}
                    </td>

                    <td class="border text-center p-1 border-slate-800">
                        {{ ucfirst($user->created_at->translatedFormat('d F')) }}
                    </td>

                    <td class="border p-1 text-xs text-center border-slate-800">
                        <button class="bg-green-500 text-white p-1 rounded-4xl">
                            {{ $user->role }}
                        </button>
                    </td>

                    <td class="p-1 text-center">
                        <div class="flex gap-5 justify-center items-center">

                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-500 text-white p-1 text-xs">
                                    Supprimer
                                </button>
                            </form>

                            <a
                                class="underline"
                                href="{{ route('users.show', $user) }}">
                                Voir
                            </a>

                        </div>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="p-4 text-center">
                        Aucun utilisateur
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="mt-5 flex justify-center">
        {{ $users->links() }}
    </div>

</div>

@endsection

