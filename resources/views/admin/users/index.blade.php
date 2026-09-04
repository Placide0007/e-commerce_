@extends('layouts.admin')

@section('title', 'Users|Admin')

@section('content')

<div class="w-full">


    <table class="w-full text-center   overflow-hidden">

        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="border-r  border-slate-700 p-2">Nom</th>
                <th class="border-r border-slate-700 p-2">Email</th>
                <th class="border-r border-slate-700 p-2">Role</th>
                <th class="">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($users as $user)
                <tr class="border border-slate-800 hover:bg-slate-700">

                    <td class="border p-1 border-slate-800 ">
                        {{ Str::ucfirst($user->name) }}
                    </td>

                    <td class="border p-1 border-slate-800 ">
                        {{ $user->email }}
                    </td>

                    <td class="border p-1 text-xs border-slate-800 ">
                        <button class="bg-green-500 text-white p-1 rounded-4xl" >{{ $user->role }}</button>
                    </td>

                    <td class="p-1">
                        <div class="flex gap-5 justify-center items-center" >
                            <button class="bg-red-500 text-white p-1 text-xs " >Supprimer</button>
                            <a class="underline" href="">Voir</a>
                        </div>
                    </td>

                </tr>  
            @empty
                <p>Aucun utilisateur</p>
            @endforelse

        </tbody>

    </table>

</div>

@endsection
