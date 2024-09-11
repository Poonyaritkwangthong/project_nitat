@extends('layouts.app')

@section('title')
edit brand
@endsection

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('brand.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>brand name:</strong>
                        <input type="text" name="b_name" value="{{ $brand->b_name }}" class="form-control" placeholder=" b_name">
                        <strong>brand image:</strong>
                        <input type="text" name="b_img" value="{{ $brand->b_name }}" class="form-control" placeholder=" b_img">
                        <strong>brand location:</strong>
                        <input type="text" name="b_location" value="{{ $brand->b_location }}" class="form-control" placeholder=" b_location">
                        <strong>founded year:</strong>
                        <input type="date" name="founded_year" value="{{ $brand->founded_year }}" class="form-control" placeholder=" founded_year">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection
