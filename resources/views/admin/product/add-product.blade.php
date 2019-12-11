@extends('admin.master')

@section('body')
    <div class="container-fluid">
        @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <h2>Add-Product</h2>
            <div class="col-md-12">
                 {{Form::open(['route'=>'new-product', 'enctype'=>'multipart/form-data'])}}
                   <div class="form-group">
                       {{Form::label('Product Name')}}
                       {{Form::text('product_name','',['class'=>'form-control','placeholder'=>'Product Name'])}}
                   </div>
                   <div class="form-group">
                       {{Form::label('Category Name')}}
                       <select name="cat_id" class="form-control">
                           <option>---Select Category---</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->cat_name}}</option>
                           @endforeach
                       </select>
                   </div>
                <div class="form-group">
                    {{Form::label('Brand Name')}}
                    <select name="brand_id" class="form-control">
                        <option>---Select Brand---</option>
                        @foreach($brands as $brand)
                         <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                         @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('Product Price')}}
                    {{Form::text('product_price','',['class'=>'form-control','placeholder'=>'Product Price'])}}
                </div>
                <div class="form-group">
                    {{Form::label('Short Description')}}
                    {{Form::textarea('short_desc','',['class'=>'form-control','rows'=>'3'])}}
                </div>
                <div class="form-group">
                    {{Form::label('Long Description')}}
                    {{Form::textarea('long_desc','',['class'=>'form-control','id'=>'editor'])}}
                </div>
                <div class="form-group">
                    <select name="product_size" class="form-control">
                        <option>---Select Product Size---</option>
                        <option value="xxl">XXL</option>
                        <option value="xl">XL</option>
                        <option value="l">L</option>
                        <option value="m">M</option>
                        <option value="s">S</option>
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('Product Quantity')}}
                    {{Form::number('product_qty','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('Product Image')}}
                    <input type="file" class="form-control-file" name="main_image">
                </div>
                <div class="form-group">
                    {{Form::label('Image Gallery')}}
                    <input type="file" class="form-control-file" name="image_file[]" multiple>
                </div>
                <div class="form-group">
                    {{Form::submit('Add Product',['class'=>'btn btn-block btn-secondary'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    @endsection
