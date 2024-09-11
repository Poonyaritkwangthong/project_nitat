@extends('layouts.app')

@section('appbar')
<div class="flex justify-center gap-6 mt-[3rem]">
    <div class=" p-2 text-2xl">
        <nav>
            <a href="{{ url('/brand') }}" class="w-[10rem] h-[4rem] bg-black text-white rounded-2xl p-2">BRAND</a>
            <a href="{{ url('/engine') }}"  class="w-[10rem] h-[4rem] bg-black text-white rounded-2xl p-2">ENGINE</a>
            <a href="{{ url('car') }}"  class="w-[10rem] h-[4rem] bg-black text-white rounded-2xl p-2">CAR</a>
        </nav>
    </div>
</div>
@endsection

@section('content')
    <div>
        <h1 class="mt-[3rem] text-red-500 text-center text-3xl">welcome admin</h1>
        <img class="mt-[3rem] mx-auto" src="https://preview.redd.it/ldz4i6wdl7r21.png?auto=webp&s=04259c8d9027041d53307b072708f4f61a711980" alt="">
    </div>
@endsection
