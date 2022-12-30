@extends('layouts.dashboard.app')
@section('body')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Brands</h1>

    @if($message=session('message'))
    <div class="text-center alert-success" style=" margin: 20px;border-radius: 20px;">
        <p>{{$message}} </p>
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div> --}}
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Logo</th>
                <th>Url</th>
                <th>Coupons</th>
                <th>Edit</th>
                <th>Delete</th>

              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Logo</th>
                <th>Url</th>
                <th>Coupons</th>
                <th>Edit</th>
                <th>Delete</th>

              </tr>
            </tfoot>
            <tbody>
              @foreach ($brands as $brand)
              <tr>
                <td>{{$brand->name}}</td>
                <td><img width="60px" height="60px" style="margin-bottom: 10px" src="{{$brand->path ? asset('images/'.$brand->path) : 'no' }}  "></td>
                <td>{{$brand->url}}</td>
                <td><a class='btn btn-info' href="{{route('all-brand-coupons',['brand'=>$brand])}}">Coupons</a></td>
                <td><a class='btn btn-primary' href="{{route('edit-brand',['brand'=>$brand->slug])}}">Edit</a></td>
                <td> <form action="{{route('delete-brand',['brand'=>$brand->slug])}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class='btn btn-danger'>Delete</button>
                </form>
               </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
  @endsection
