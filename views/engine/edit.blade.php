@extends('layouts.app')

@section('title')
edit engine
@endsection

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('engine.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('engine.update',$engine->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>engine type:</strong>
                        <input type="text" name="e_type" value="{{ $engine->e_type }}" class="form-control" placeholder="">
                        <strong>engine detail:</strong>
                        <input type="text" name="e_detail" value="{{ $engine->e_detail }}" class="form-control" placeholder="">
                        <strong>engine hp:</strong>
                        <input type="text" name="e_hp" value="{{ $engine->e_hp }}" class="form-control" placeholder="">
                        <strong>engine image:</strong>
                        <input type="text" name="e_img" value="{{ $engine->e_img }}" class="form-control" placeholder="">
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
