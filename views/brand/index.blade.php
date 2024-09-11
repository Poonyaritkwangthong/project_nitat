@extends('layouts.app')

@section('title')
Brand
@endsection

@section('content')
<h1 class="mx-[300px] mt-10 text-4xl">brand page</h1>
<a href="{{ url('/admin') }}"><i><button class="bg-blue-500 text-white w-[4rem] h-[2rem] ">Back</button></i></a>
    <div class="mt-10">
        <div class="mx-[340px]">
            <a href="{{ route('brand.create') }}"><button class="bg-green-500 text-white p-2 ">Add Brand</button></a>
        </div>
        <table class="mx-[300px] bg-slate-400 border-spacing-2 border-2 border-black border-collapse">
            <thead>
                <tr class="border-2 border-black text-center text-2xl text-white">
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th>Brand Image</th>
                    <th>Brand Location</th>
                    <th>Founded Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $brands as $item )
                <tr class="border-2 border-black text-center text-white">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->b_name }}</td>
                    <td><img class="w-[10rem] h-[10rem]" src="{{ $item->b_img }}" alt="brand"></td>
                    <td>{{ $item->b_location }}</td>
                    <td>{{ $item->founded_year }}</td>
                    <td>
                        <form action="{{ route('brand.destroy',$item->id) }}" method="Post">
                        <a class="bg-yellow-500 text-white p-2" href="{{ route('brand.edit',$item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white p-2">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
