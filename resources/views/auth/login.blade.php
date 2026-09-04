@extends('layouts.auth')

@section('title','Connexion')

@section('content')

    <div class="flex justify-center items-center min-h-screen" >

        <form class="bg-white p-5 w-95  flex flex-col gap-5 shadow-xl" action="{{ route('login') }}" method="post">
            
            @csrf

            <p class="text-center font-semibold mb-5" >Connexion</p>

            <div>
                <input placeholder="Email" class="w-full border    p-4 border-slate-200 bg-slate-100"  type="email" name="email" id="">
                @error('email')
                    <p class="text-red-500 bg-red-100 text-[11px]" >{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input placeholder="Mot de passe" class="w-full border   p-4 border-slate-200 bg-slate-100"  type="password" name="password" id="">
                @error('password')
                    <p class="text-red-500 bg-red-100 text-[11px]" >{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-slate-900 text-xs text-gray-300 border-0 p-5 cursor-pointer" >Se connecter</button>

            <div class="text-xs" >
                <a class="underline" href="{{ route('register') }}">Creer un compte</a>
            </div>
            
        </form>

    </div>

@endsection