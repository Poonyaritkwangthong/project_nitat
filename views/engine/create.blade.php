@extends('layouts.app')

@section('title')
    create engine
@endsection

@section('content')
<div class="">
    <div class="">
        <div class="text-center">
            <div class="">
                <h2>Add engine</h2>
            </div>
            <div class="">
                <a class="btn btn-primary" href="{{ route('engine.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form class="" action="{{ route('engine.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <div class= "">
                <div class="w-1/6 h-1/3 border-4 p-4 ml-[600px] mt-[20px]">
                    <strong>engine type:</strong>
                    <input type="text" name="e_type" class="form-control" placeholder="e_type">
                    @error('e_type')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong class="">engine detail:</strong>
                    <input type="text" name="e_detail" class="form-control" placeholder="e_detail">
                    @error('e_detail')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong class="">engine hp:</strong>
                    <input type="text" name="e_hp" class="form-control" placeholder="e_hp">
                    @error('e_hp')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <strong class="">engine image:</strong>
                    <input type="text" name="e_img" class="form-control" placeholder="e_img">
                    @error('e_img')
                    <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="ml-[620px]">Submit</button>
        </div>
    </form>
</div>
@endsection
