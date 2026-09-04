@extends('layouts.admin')

@section('title', 'Dashboard|Admin')

@section('content')

    <div>

        <p class=" font-semibold underline" >Dashboard Section</p>

        <div class="grid justify-center gap-25 grid-cols-3 py-5  p-5" >

            <div class=" rounded border  flex flex-col gap-3 justify-center items-center border-slate-300 bg-slate-50 h-25" >
                <p class="font-semibold text-xl  text-slate-800" >Total Clients</p>
                <h2 class="text-red-500 text-[15px]  font-bold" >
                    {{ $users->count() }}
                </h2>
            </div>

            <div class=" rounded border  flex flex-col gap-3 justify-center items-center border-slate-300 bg-slate-50 h-25" >
                <p class="font-semibold text-xl  text-slate-800" >Total Produits</p>
                <h2 class="text-red-500 text-[15px]  font-bold" >
                    34223
                </h2>
            </div>

            <div class=" rounded border  flex flex-col gap-3 justify-center items-center border-slate-300 bg-slate-50 h-25" >
                <p class="font-semibold text-xl  text-slate-800" >Total Categories</p>
                <h2 class="text-red-500 text-[15px]  font-bold" >
                    455444
                </h2>
            </div>

        </div>

        <div>
            {!! $chart->container() !!}
        </div>

        {!! $chart->script() !!}

    </div>

@endsection