@extends('layouts.dashboard.app')
@section('body')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Coupons</h1>
        @if ($message = session('message'))
            <div class="text-center alert-success " style=" margin: 20px;border-radius: 20px;">
                <p>{{ $message }} </p>
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
                                <th>Discount</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Discount</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->name }}</td>
                                    <td>{{ $coupon->discount }}%</td>
                                    <td>{{ $coupon->brand->name }}</td>
                                    <td>{{ $coupon->description }}</td>
                                    <td><a class='btn btn-primary'
                                            href="{{ route('edit-coupon', ['coupon' => $coupon->id]) }}">Edit</a></td>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="#" data-toggle="modal"
                                            data-target="#DeleteCouponModal">
                                            Delete
                                        </a>
                                        <div class="modal fade" id="DeleteCouponModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Coupon</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure you want to delete this coupon?</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('delete-coupon', ['coupon' => $coupon->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger" type="submit">Delete
                                                                Coupon</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <form action="{{ route('delete-coupon', ['coupon' => $coupon->id]) }}" method="post">
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
