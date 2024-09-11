<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="">
        <div class="flex justify-nomal gap-4 p-4 bg-black ">
            <a href="{{ url('/home') }}"><i><button class="bg-blue-500 text-white text-xl w-[6rem] h-[3rem] rounded-full">Home</button></i></a>
            <a href="{{ url('/admin') }}"><i><button class="bg-blue-500 text-white text-xl w-[6rem] h-[3rem] rounded-full">Admin</button></i></a>
            <a href="{{ url('/home') }}"><i><button class="bg-blue-500 text-white text-xl w-[6rem] h-[3rem] rounded-full">Home</button></i></a>
            <a href="{{ url('/home') }}"><i><button class="bg-blue-500 text-white text-xl w-[6rem] h-[3rem] rounded-full">Home</button></i></a>
            <a href="{{ url('/home') }}"><i><button class="bg-blue-500 text-white text-xl w-[6rem] h-[3rem] rounded-full">Home</button></i></a>
            <a href="{{ url('/home') }}"><i><button class="bg-blue-500 text-white w-[5rem] h-[2rem]  mt-[1rem] ml-[47rem] rounded-full">Login</button></i></a>
            <a href="{{ url('/home') }}"><i><button class="bg-red-500 text-white w-[5rem] h-[2rem] mt-[1rem] rounded-full">Logout</button></i></a>
        </div>
    </div>
@yield('appbar')
@yield('content')
@yield('car_show')
</body>
</html>
