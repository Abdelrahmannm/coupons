@extends('layouts.dashboard.app')
@section('body')

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

<form action="{{route('update-coupon',['coupon'=>$coupon])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="name"> Name </label>
        <input type="text" name="name" class="form-control" value={{$coupon->name}}>
    </div>
    <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="description"> Description</label>
        <input type="text" name="description" class="form-control" value={{$coupon->description}}>
    </div>
    <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="discount"> Discount </label>
        <input type="text" name="discount" class="form-control" value={{$coupon->discount}}>
    </div>
    <div class="form-group" style=" width: 50%;margin-left: 20px;">
        <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id"  style="border-radius: 20px;">
                @foreach ($brands as $brand)
                @if ($coupon->brand->id==$brand->id)
                    <option selected value="{{$brand->id}}">{{$brand->name}}</option>
                @else
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endif

                @endforeach
            </select>
    </div>

    <div class="form-group" style=" width: 50%;margin-left: 20px; margin-top:10px;">
        <input type="submit" class="btn btn-info" name="submit" value="Publish Coupon">
    </div>
</form>
@endsection
