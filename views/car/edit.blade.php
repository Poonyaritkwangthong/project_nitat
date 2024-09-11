@extends('layouts.app')

@section('title')
edit car
@endsection

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('car.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('car.update',$car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Car name:</strong>
                        <input type="text" name="c_name" value="{{ $car->c_name }}" class="form-control" placeholder="">
                        <strong>Car Image:</strong>
                        <input type="text" name="c_img" value="{{ $car->c_img }}" class="form-control" placeholder="">
                        <strong>Car detail:</strong>
                        <input type="text" name="c_detail" value="{{ $car->c_detail }}" class="form-control" placeholder="">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label block"><strong>engine type:</strong></label>
                    <div class="grid grid-cols-2">
                        @foreach($engines as $item)
                        <div>
                        <input class="accent-black" type="radio" name="c_engine_id" value="{{ $item->id }}" {{ ($item->id == $car->c_engine_id)  ? 'checked' : ''}}>
                        {{ $item->e_type }}
                    </div>
                        @endforeach
                    </div>
                    @error('c_engine_id')
                        <div class="form-text text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label block"><strong>brand name:</strong></label>
                    <div class="grid grid-cols-2">
                        @foreach($brands as $item)
                        <div>
                        <input class="accent-black" type="radio" name="c_brand_id" value="{{ $item->id }}" {{ ($item->id == $car->c_brand_id)  ? 'checked' : ''}}>
                        {{ $item->b_name }}
                    </div>
                        @endforeach
                    </div>
                    @error('c_brand_id')
                        <div class="form-text text-red-700">{{ $message }}</div>
                    @enderror
                </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection
