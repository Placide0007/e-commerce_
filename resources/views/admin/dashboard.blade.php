@extends('layouts.admin')

@section('title', 'Dashboard|Admin')

@section('content')

    <div>
        <p class="text-xl font-semibold underline" >Dashboard Section</p>

        {{-- cards section --}}

        <div class="grid justify-center grid-cols-3 py-5  p-5" >
            <div class=" rounded border w-60 flex flex-col gap-3 justify-center items-center border-slate-300 bg-slate-50 h-25" >
                <p class="font-semibold text-2xl  text-slate-800" >Produits</p>
                <h2 class="text-red-400 text-xl font-bold" >232</h2>
            </div>

            <div class=" rounded border w-60 flex flex-col gap-3 justify-center items-center border-slate-300 bg-slate-50 h-25" >
                <p class="font-semibold text-2xl  text-slate-800" >Total Vendu</p>
                <h2 class="text-red-400 text-xl font-bold" >2334342</h2>
            </div>

            <div class=" rounded border w-60 flex flex-col gap-3 justify-center items-center border-slate-300 bg-slate-50 h-25" >
                <p class="font-semibold text-2xl  text-slate-800" >Categories</p>
                <h2 class="text-red-400 text-xl font-bold" >2334342</h2>
            </div>

        </div>

        <div>
            {!! $chart->container() !!}
        </div>

        
        {!! $chart->script() !!}
    </div>

@endsection