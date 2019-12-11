@extends('front-end.master')


@section('body')
    <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                         <h3 class="text-center">
                             Thank you Mr. <strong class="text-success">{{Session::get('customerName')}}</strong> for your order . We will contact you soon to confirm your order ?
                         </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
