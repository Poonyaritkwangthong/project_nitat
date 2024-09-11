@extends('layouts.app')
@section('title')
form
@endsection

@section('content')
<div class="">
    <div class="">
        <div class="text-center">
            <div class="">
                <h2>Add car</h2>
            </div>
            <div class="">
                <a class="btn btn-primary" href="{{ route('car.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form class="" action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class= "w-[340px] h-[300px] border-4 p-4 ml-[500px] mt-[20px]">
                <div class="form-label block">
                    <strong>Car name:</strong>
                    <input type="text" name="c_name" class="form-control" placeholder="sid">
                    @error('c_name')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong class="">Car image:</strong>
                    <input type="text" name="c_img" class="form-control" placeholder="lname">
                    @error('c_img')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong>Car detail:</strong>
                    <input type="text" name="c_detail" class="form-control" placeholder="fname">
                    @error('c_detail')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label block"><strong>Engine Type:</strong></label>
                        <div class="grid grid-cols-2">
                            @foreach($engines as $item)
                            <div>
                                <input class="accent-black" type="radio" name="c_engine_id" value="{{ $item->id }}">
                                {{ $item->e_type }}
                            </div>
                            @endforeach
                        </div>
                        @error('std_prg__id')
                            <div class="form-text text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label block"><strong>Engine Type:</strong></label>
                        <div class="grid grid-cols-2">
                            @foreach($brands as $item)
                            <div>
                                <input class="accent-black" type="radio" name="c_brand_id" value="{{ $item->id }}">
                                {{ $item->b_name }}
                            </div>
                            @endforeach
                        </div>
                        @error('std_prg__id')
                            <div class="form-text text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
