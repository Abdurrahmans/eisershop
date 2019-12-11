
@extends('admin.master')

@section('body')
    <div class="container">
        @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">View Brand</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Image</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <tbody>
                                @php ($i = 1)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td><img src="{{asset($product->main_image)}}" width="80"></td>
                                        <td>{{$product->cat_name}}</td>
                                        <td>{{$product->brand_name}}</td>
                                        <td>
                                            <a href=""  class="btn btn-sm btn-warning" data-toggle="modal" data-target="#view{{$product->id}}">
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                            <a href=""  class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$product->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('delete-product',['id'=>$product->id])}}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @include('admin.product.view-details')
                                    @include('admin.product.edit-product')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

