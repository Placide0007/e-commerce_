@extends('layouts.auth')

@section('title','Inscription')

@section('content')

    <div class="flex justify-center items-center min-h-screen" >

        <form class="bg-gray-50 p-5 w-95  flex flex-col gap-7" action="" method="post">

            @csrf

            <p class="text-center font-semibold mb-5" >Inscripton</p>

            <div>
                <input placeholder="Nom" class="w-full border bg-gray-300  p-4 border-slate-300"  type="text" name="" id="">
            </div>

            <div>
                <input placeholder="Email" class="w-full border bg-gray-300  p-4 border-slate-300"  type="email" name="" id="">
            </div>

            <div>
                <input placeholder="Mot de passe" class="w-full border bg-gray-300 p-4 border-slate-300"  type="password" name="" id="">
            </div>

            <button class="bg-slate-900 text-xs text-gray-300 border-0 p-5 cursor-pointer" >Se connecter</button>

            <div class="flex justify-between items-center text-xs" >
                <p>A deja un compte?</p>
                <a class="underline " href="{{ route('login') }}">Connexion</a>
            </div>
            
        </form>

    </div>

@endsection