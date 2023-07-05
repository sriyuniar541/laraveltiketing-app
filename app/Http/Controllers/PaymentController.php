<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;



class PaymentController extends Controller
{
    //cart
        public function cart () {
            $payment = Payment::get();

            return view('tiketing.cart', [
                
                'payment' => $payment 
            ]); 
        
        }


    //list_order
        public function list_order () {
            $payment = Payment::get();

            return view('tiketing.list_order', [
                
                'payment' => $payment 
            ]); 
        
        }

    //page cek_checkout
        public function get_page_checkout ($id) {
            $payment = Payment::find($id);  

            return view('tiketing.payment', [
                
                'payment' => $payment,

            ]); 
        
        }

    //page after checkout
        public function callback_midtrans (Request $request) {
          
            $serverkey = config('midtrans.Server_Key');
            $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverkey);
            if($hashed == $request->signature_key) {
                if($request->transaction_status == 'capture') {
                    $payment = Payment::find($request->order_id);
                    $payment->update(['status' => 'Paid']);
                }
            }
        }

    //page after checkout invoice
        public function invoice ($id) {
            $payment = Payment::find($id);  
            return view('tiketing.invoice', compact('payment'));
          
        }


    //page checkout
        public function checkout ($id) {

            $payment = Payment::findOrFail($id); 
            
            $user = User::find($payment-> user_id);

            \Midtrans\Config::$serverKey = config('midtrans.Server_Key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'Concert_name'=> $payment-> concert_name,
                    'Address' => $payment-> address,
                    'Gate' => $payment-> gate,
                    'Seat' => $payment-> seat,
                    'Date' => $payment-> date,
                    'order_id' => $payment->id,
                    'gross_amount' => $payment->total_price
                ),
                'customer_details' => array(
                    'name' => $user->name, 
                    'name' => 'sri',
                    'phone' => '08111222333',
                ),
            );

            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $id =  $payment->id;

            return view('tiketing.checkout', [
                
                'snapToken' => $snapToken,
                'id' => $id

            ]); 
        
        }


    // add to cart
        public function  add_to_cart(Request $request) {

            $payment = Payment::findOrFail($request->tiketing_id); 

            $validateData = [
                'concert_name'=> $request-> concert_name,
                'address' => $request-> address,
                'gate' => $request-> gate,
                'seat' => $request-> seat,
                'date' => $request-> date,
                'price'=> $request-> price,
                'qty' => 1,
                'image' => $request-> image,
                'total_price' =>  $request-> price,
                'status' => 'Unpaid',
                'tiketing_id' =>  $request->tiketing_id
                ]; 

            $validateData['user_id'] = auth()->user()->id;

            
            Payment::create($validateData);

            $request->session()->flash('success', 'insert cart success');

            return redirect()->route('getById', ['id' => $request->tiketing_id]);
            
        }
    

    //payment
        public function cek_checkout(Request $request, $id) {

            $payment = Payment::find($id);  

            $validateData = [
                'gate' => $request-> gate, 
                'seat' => $request-> seat, 
                'qty' => $request-> qty, 
                'total_price' =>  $payment-> price * $request-> qty
            ];

            $validateData['user_id'] = auth()->user()->id;

            Payment::where('id',$id)->update($validateData);
            
            $request->session()->flash('success', 'Ayo selesaikan pembayaran');

            return redirect()->route('checkout', ['id' => $id]);

        }

         // delete_cart
         public function delete_cart (Request $request, $id) {

            $payment = Payment::find($id);  

            $payment->delete();

            $request->session()->flash('success', 'Delete data success');

            return back();
            
        
        }

 }


