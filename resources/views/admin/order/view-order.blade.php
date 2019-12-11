
@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3 class="font-weight-bold text-center">Order info  for this order</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order No</th>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$order->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$order->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3 class="font-weight-bold text-center">Customer info  for this order</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                          <tr>
                              <th>Customer Name</th>
                              <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                          </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{$customer->phone_no}}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{$customer->email_address}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$customer->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3 class="font-weight-bold text-center">Shipping info for this order</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td>{{$shipping->full_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{$shipping->phone_no}}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{$shipping->email_address}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$shipping->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3 class="font-weight-bold text-center">Payment info for this order</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Payment Type</th>
                                <td>{{$payment->payment_type}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{$payment->payment_status}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3 class="font-weight-bold text-center">Product Info for this order</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-info">
                            <tr class="font-weight-bold text-white">
                                <th>S1</th>
                                <th>Product Name</th>
                                <th>Product Id</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th >Product Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($i = 1)
                             @foreach($orderDetails as $orderDetail)
                                <tr>
                                   <td>{{$i++ }}</td>
                                    <td>{{$orderDetail->product_id}}</td>
                                    <td>{{$orderDetail->product_name}}</td>
                                    <td>TK {{$orderDetail->product_price}}</td>
                                    <td>{{$orderDetail->product_qty}}</td>
                                    <td>TK {{$orderDetail->product_price * $orderDetail->product_qty}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
