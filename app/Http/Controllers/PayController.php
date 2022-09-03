<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayController extends Controller
{
    public function createTransaction(){
        return view('pages.paypal.test');
    }

    public function processTransaction(Request $request){
        $total = Session::get('total_paypal');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id'] != null){
            foreach($response['links'] as $links){
                if($links['rel'] == 'approve'){
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('checkout')
                ->with('error', 'Có biến rồi Sen ơii');
        }else{
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Có biến rồi Sen ơii');
        }
    }

    public function successTransaction(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
            Session::put('success_paypal',true);
            return redirect()
                ->route('checkout')
                ->with('success', 'Thanh toán bằng Paypal thành công');
        }else{
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Có biến rồi Sen ơii');
        }
    }

    public function cancelTransaction(Request $request){
        return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Bạn đã đóng giao dịch bằng Paypal');
    }
}
