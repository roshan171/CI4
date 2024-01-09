<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Razorpay;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment_form');
    }

    public function processPayment()
    {
        $input = $this->request->getPost();
        
        // Load Razorpay configuration
        $razorpayConfig = new Razorpay();

        // Initialize Razorpay
        $razorpay = new \Razorpay\Api\Api($razorpayConfig->keyId, $razorpayConfig->keySecret);

        // Create an order
        $order = $razorpay->order->create([
            'amount' => $input['amount'] * 100, // Amount in paise
            'currency' => 'INR',
            'payment_capture' => 1, // Auto capture
        ]);

        // Send order ID to the payment form
        return view('payment_form', ['order' => $order]);
    }
}
