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
                <td><a class='btn btn-primary' href="{{route('edit-brand',['brand'=>$brand->id])}}">Edit</a></td>

                <td>
                    <a class="btn btn-danger"  href="#" data-toggle="modal" data-target="#DeleteBrandModal">
                        Delete
                    </a>
                    <div class="modal fade" id="DeleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">this brand contains {{$brand->coupons->count()}} coupons</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <form action="{{route('delete-brand',['brand'=>$brand->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Delete Brand</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                {{-- <form action="{{route('delete-brand',['brand'=>$brand->id])}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class='btn btn-danger'>Delete</button>
                </form> --}}
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
