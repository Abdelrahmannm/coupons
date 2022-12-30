@extends('layouts.dashboard.app')
@section('body')
<h3 style="margin-left: 20px;"> Edit Brand</h3>
<form method="post" action="{{route('update-brand',['brand'=>$brand])}}"  enctype="multipart/form-data">
    @csrf
    @method('put')
    @if($message=session('message'))
    <div class="text-center alert-success " style="width: 50%; margin-left: 20px;border-radius: 20px;">
        <p>{{$message}} </p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger" style="width: 50%;margin-left: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="name"> Name </label>
        <input type="text" name="name" class="form-control" value="{{$brand->name}}">
    </div>
    {{-- <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="slug"> Slug</label>
        <input type="text" name="slug" class="form-control">
    </div> --}}
    <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="url"> Url </label>
        <input type="text" name="url" class="form-control" value="{{$brand->url}}">
    </div>
    <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="logo"> Logo </label>
        <img width="60px" height="60px" style="margin-bottom: 10px" src="{{$brand->path ? asset('images/'.$brand->path) : 'no' }}  ">
        <input type="file" name="logo" class="form-control">
    </div>

    <div class="form-group" style=" width: 50%;margin-left: 20px; margin-top:10px;">
        <input type="submit" class="btn btn-info" name="create_post" value="Publish Coupon">
    </div>
</form>
@endsection
