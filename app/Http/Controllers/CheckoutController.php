<?php

namespace App\Http\Controllers;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use Cart;
use Mail;
use App\Customer;
use Illuminate\Http\Request;
use Session;
use Stripe;

class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-register');
    }

    public function signUp(Request $request){
       $customer =new Customer();

       $customer->first_name     = $request->first_name;
        $customer->last_name     = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password      = bcrypt($request->password);
        $customer->phone_no      = $request->phone_no;
        $customer->address       = $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();
        Mail::send('front-end.mails.welcome-mail',$data, function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('Welcome to Eiser Shop');
        });

        return redirect('/checkout/shipping');
    }

    public function customerLoginCheck(Request $request){
        $customer = Customer::where('email_address' ,$request->email_address)->first();

        if(password_verify($request->password , $customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);

            return redirect('/checkout/shipping');
        }
        else{
            return redirect('/checkout')->with('message', 'invalid password');
        }
    }
    public function customerLogout(){

        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }

    public function newCustomerLogin(){
        return view('front-end.customer.customer-login');
    }
    public  function shipping(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.checkout-shipping',[
            'customer' => $customer,
        ]);
    }

    public function saveShippingInfo(Request $request)
    {
        $shipping = new Shipping();
        $shipping->full_name     = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_no      = $request->phone_no;
        $shipping->address       = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm(){

        return view('front-end.checkout.payment');
    }
    public function newOrder(Request $request){
      $paymentType = $request->payment_type;

      if($paymentType == 'Cash'){

          $order  = new Order();

          $order->customer_id  = Session::get('customerId');
          $order->shipping_id  = Session::get('shippingId');
          $order->order_total  = Session::get('orderTotal');
          $order->save();


          $payment = new Payment();
          $payment->order_id     = $order->id;
          $payment->payment_type = $paymentType;
          $payment->save();

          $cartProducts = Cart::content();

          foreach ($cartProducts as $cartProduct){

              $orderDetail = new OrderDetails();
              $orderDetail->order_id      = $order->id;
              $orderDetail->product_id    = $cartProduct->id;
              $orderDetail->product_name  = $cartProduct->name;
              $orderDetail->product_price = $cartProduct->price;
              $orderDetail->product_qty   = $cartProduct->qty;
              $orderDetail->save();
          }

          Cart::destroy();

          return redirect('/checkout/payment/confirm');

      }
       elseif ($paymentType == 'Stripe'){


           $order  = new Order();

           $order->customer_id  = Session::get('customerId');
           $order->shipping_id  = Session::get('shippingId');
           $order->order_total  = Session::get('orderTotal');
           $order->save();


           $payment = new Payment();
           $payment->order_id     = $order->id;
           $payment->payment_type = $paymentType;
           $payment->save();

           $cartProducts = Cart::content();

           foreach ($cartProducts as $cartProduct){

               $orderDetail = new OrderDetails();
               $orderDetail->order_id      = $order->id;
               $orderDetail->product_id    = $cartProduct->id;
               $orderDetail->product_name  = $cartProduct->name;
               $orderDetail->product_price = $cartProduct->price;
               $orderDetail->product_qty   = $cartProduct->qty;
               $orderDetail->save();
           }

           Cart::destroy();

           return redirect('/checkout/payment/stripe');

      }
      elseif ($paymentType == 'Bkash'){

      }
      elseif ($paymentType == 'Rocket'){

      }
    }
    public function confirmPayment(){

        return view('front-end.checkout.confirm-payment');
    }
    public function stripe()
    {
        return view('front-end.checkout.stripe');
    }
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount"      => 100 * 100,
            "currency"    => "usd",
            "source"      => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return redirect('/checkout/payment/confirm');
    }

}
