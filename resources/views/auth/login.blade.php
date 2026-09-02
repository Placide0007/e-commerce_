@extends('layouts.auth')

@section('title','Connexion')

@section('content')

    <div class="flex justify-center items-center min-h-screen" >

        <form class="bg-gray-50 p-5 w-95  flex flex-col gap-7" action="" method="post">
            
            @csrf

            <p class="text-center font-semibold mb-5" >Connexion</p>

            <div>
                <input placeholder="Email" class="w-full border bg-gray-300  p-4 border-slate-300"  type="email" name="" id="">
            </div>

            <div>
                <input placeholder="Mot de passe" class="w-full border bg-gray-300 p-4 border-slate-300"  type="password" name="" id="">
            </div>

            <button class="bg-slate-900 text-xs text-gray-300 border-0 p-5 cursor-pointer" >Se connecter</button>

            <div class="flex justify-between items-center text-xs" >
                <p>Pas de compte?</p>
                <a class="underline" href="{{ route('register') }}">Creer un compte</a>
            </div>
            
        </form>

    </div>

@endsection