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
            <tr class="border border-slate-200 hover:bg-slate-50">

                <td class="border p-1 border-slate-200 ">
                    Rakoto
                </td>

                <td class="border p-1 border-slate-200 ">
                    rakoto@gmail.com
                </td>

                <td class="border p-1 text-xs border-slate-200 ">
                    <button class="bg-green-200 p-1 rounded-4xl" >Utilisateur</button>
                </td>

                <td class="p-1">
                    <div class="flex gap-5 justify-center items-center" >
                        <button class="bg-red-500 text-white p-1 text-xs " >Supprimer</button>
                        <a class="underline" href="">Voir</a>
                    </div>
                </td>

            </tr>
        </tbody>

    </table>

</div>

@endsection
