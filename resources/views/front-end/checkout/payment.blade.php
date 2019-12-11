@extends('front-end.master')


@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h3 class="text-center">
                   Dear,  <strong class="text-success">{{Session::get('customerName')}}</strong> You have to give us product payment method...
               </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-2">
                <form action="{{route('new-order')}}" method="post">
                    @csrf
                    <div class="card mb-5">
                        <div class="card-header bg-success">
                            <h1 class="text-center">Payment</h1>
                        </div>
                        <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Cash on Delivery</th>
                                        <td><input type="radio" name="payment_type" value="Cash">Cash on Delivery</td>
                                    </tr>
                                    <tr>
                                        <th>Paypal/Stripe</th>
                                        <td><input type="radio" name="payment_type" value="Stripe">Stripe</td>
                                    </tr>
                                    <tr>
                                        <th>Bkash</th>
                                        <td><input type="radio" name="payment_type" value="Bkash">Bkash</td>
                                    </tr>
                                    <tr>
                                        <th>Rocket</th>
                                        <td><input type="radio" name="payment_type" value="Rocket">Rocket</td>
                                    </tr>
                                </table>
                            <hr>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Confirm Order</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
