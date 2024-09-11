@extends('layouts.app')

@section('title')
car
@endsection

@section('content')
<h1 class="mx-[300px] mt-10 text-4xl">car page</h1>
<a href="{{ url('/admin') }}"><i><button>Back</button></i></a>
    <div class="mt-10">
        <div class="mx-[340px]">
            <a href="{{ route('car.create') }}">Add car</a>
        </div>
        <table class="mx-[300px]">
            <thead class="">
                <tr class="border-collapse border border-slate-500 text-center text-2xl">
                    <th>Car ID</th>
                    <th>Car Name</th>
                    <th>Car Image</th>
                    <th>Car Detail</th>
                    <th>Car Engine</th>
                    <th>Car Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $cars as $item )
                <tr class="border-collapse border border-slate-500 text-center ">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->c_name }}</td>
                    <td><img class="w-[20rem] h-[10rem]" src="{{ $item->c_img }}" alt="car"></td>
                    <td>{{ $item->c_detail }}</td>
                    <td>{{ $item->c_engine_id }}</td>
                    <td>{{ $item->c_brand_id }}</td>
                    <td>
                        <form action="{{ route('car.destroy',$item->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('car.edit',$item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
