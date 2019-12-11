@extends('front-end.master')


@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-2">
                <h2 class="text-center ">
                    Dear,  <strong class="text-success">{{Session::get('customerName')}}</strong> <br> Provide your shipping information
                </h2>
                <h6 class="text-danger">If you want to change shipping info please edit the form</h6>
                <form action="{{route('new-shipping')}}" method="post">
                    @csrf
                    <div class="card mb-5">
                        <div class="card-header bg-success">
                            <h1 class="text-center">Shopping Information</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email Address:</label>
                                <input type="text" name="email_address" value="{{$customer->email_address}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Number:</label>
                                <input type="text" name="phone_no" value="{{$customer->phone_no}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea type="text" name="address"  class="form-control">{{$customer->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save shipping info</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
