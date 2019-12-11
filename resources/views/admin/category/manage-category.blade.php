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
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Publication Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($i = 1)
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$category->cat_name}}</td>
                                    <td>{{$category->cat_desc}}</td>
                                    <td>{{$category->status==1?'published':'unpublished'}}</td>
                                    <td class="text-center">
                                        @if($category->status==1)
                                        <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-sm btn-info">
                                            <i class="fas fa-arrow-up"></i>
                                        </a>
                                        @else
                                        <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-arrow-down"></i>
                                        </a>
                                        @endif
                                        <a href=""  class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$category->id}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit{{$category->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('update-category')}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label >Category name</label>
                                                        <input type="text" class="form-control" value="{{$category->cat_name}}" name="cat_name"  placeholder="Category name">
                                                        <input type="hidden" class="form-control" value="{{$category->id}}" name="id">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Category Discription</label>
                                                        <textarea  class="form-control"   name="cat_desc" placeholder="Category Discription">{{$category->cat_desc}}</textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>Publication status</label>
                                                        <input type="radio" name="status" value="1" {{$category->status== 1?'checked':''}}>
                                                        <label >Published</label>
                                                        <input type="radio" name="status" value="0" {{$category->status== 0?'checked':''}}>
                                                        <label >Unpublished</label>

                                                    </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="btn" class="btn btn-primary">Update Category</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
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
