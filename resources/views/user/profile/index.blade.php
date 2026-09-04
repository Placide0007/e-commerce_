@extends('layouts.base')
@section('title', 'Profile page')
@section('content')

    <div id="profile" class="px-5 sm:px-8 md:px-12 lg:px-20 xl:px-25 py-6 sm:py-10 bg-gray-50">

        <div class="flex flex-col sm:flex-row justify-between items-center sm:items-start border border-slate-200 bg-white rounded-xl p-5 sm:p-8 lg:p-12 xl:p-15 shadow-xs">

            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-center sm:items-center">

                <button class="w-28 h-28 sm:w-32 sm:h-32 lg:w-35 lg:h-35 rounded-full border border-slate-200 bg-slate-50 flex justify-center items-center overflow-hidden">

                    <img class="w-16 h-16 sm:w-20 sm:h-20" src="{{ asset('icons/profile.svg') }}" alt="Profile">

                </button>

                <div class="flex flex-col gap-2 items-center sm:items-start text-center sm:text-left">

                    <h1 class="text-xl sm:text-2xl font-bold break-all">
                        {{ Str::ucfirst(Auth::user()->name) }}
                    </h1>

                    <span class="text-xs text-slate-400">
                        {{ Str::ucfirst(Auth::user()->email) }}
                    </span>

                </div>

            </div>

        </div>

    </div>

    <div class="md:px-12 lg:px-20 xl:px-25 py-6 sm:py-10" >

        <div class="flex justify-end" >
            <p class="text-xl font-bold underline">Historique</p>
        </div>

        <div class="p-10 flex justify-center items-center" >
            <h2>Aucun</h2>
        </div>

    </div>

@endsection
