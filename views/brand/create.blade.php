@extends('layouts.app')

@section('title')
    create brand
@endsection

@section('content')
<div class="">
    <div class="">
        <div class="text-center">
            <div class="">
                <h2>Add brand</h2>
            </div>
            <div class="">
                <a class="btn btn-primary" href="{{ route('brand.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form class="" action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <div class= "">
                <div class="w-1/6 h-1/3 border-4 p-4 ml-[600px] mt-[20px]">
                    <strong>brand name:</strong>
                    <input type="text" name="b_name" class="form-control" placeholder="b_name">
                    @error('b_name')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong>brand image:</strong>
                    <input type="text" name="b_img" class="form-control" placeholder="b_img">
                    @error('b_img')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong class="">brand location:</strong>
                    <input type="text" name="b_location" class="form-control" placeholder="b_location">
                    @error('b_location')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong class="">founded year:</strong>
                    <input type="date" name="founded_year" class="form-control" placeholder="founded_year">
                    @error('founded_year')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="ml-[620px]">Submit</button>
        </div>
    </form>
</div>
@endsection
