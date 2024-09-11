@extends('layouts.app')

@section('content')
    <div class="h-80 bg-[url('https://cdn.motor1.com/images/mgl/gWLeP/s1/1990-mercedes-benz-190e-25-16-evolution-ii.webp')] bg-cover bg-center">
        <div class="h-full w-full flex flex-col justify-center items-center ">
            <h3 class="mt-[13rem] text-2xl text-white font-semibold">Car wiki</h3>
            <h1 class="text-center text-4xl text-white font-semibold drop-shadow-lg">welcome
                <span class="text-yellow-300">to website</span>
            </h1>
        </div>
    </div>
    <div class="mt-[3rem] text-center text-3xl text-blue-500">
        <h1>Car is beautifull</h1>
    </div>

        <div class="flex justify-center mt-[3rem] mx-auto">
            <i><button class="w-[14] h-[7] border-2 border-black bg-slate-400 text-white text-2xl p-2"><a href="">Europe car</a></button></i>
            <i><button class="w-[14] h-[7] border-2 border-black bg-slate-400 text-white text-2xl p-2"><a href="">USA car</a></button></i>
            <i><button class="w-[14] h-[7] border-2 border-black bg-slate-400 text-white text-2xl p-2"><a href="">Japan car</a></button></i>
        </div>
            <div class="w-[80rem] h-[30rem] border-2 border-black mx-auto">
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ( $cars as $item )
                        <div class="w-[20rem] h-[15rem] mt-[5rem] bg-slate-400 p-2">
                            <img src="{{ $item->c_img }}" alt="">
                            <h1>{{ $item->c_name }}</h1>
                            <p>{{ $item->c_detail }}</p>
                            @endforeach
                        </div>
                    </div>
            </div>
@endsection
