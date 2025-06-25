<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Square\SquareClient;
// use Square\Models\Money;
use Square\Environment;
use App\Models\Payment;
use Square\Models\CreatePaymentRequest;


class PaymentController extends Controller
{
    public function showPaymentForm(Request $request)
    {
        return view('payment');
    }

    private $squareClient;
    private $locationId;

    public function __construct()
    {
        $this->squareClient = new SquareClient([
            'accessToken' => env('SQUARE_ACCESS_TOKEN'),
            'environment' => Environment::SANDBOX,
        ]);
        $this->locationId = env('SQUARE_LOCATION_ID');
    }

    public function processPayment(Request $request)
    {
        $amount = (int) ($request->amount * 100); // Convert to cents
        $token = $request->token;

        $money = new Money();
        $money->setAmount($amount);
        $money->setCurrency('USD');

        $paymentRequest = new CreatePaymentRequest(
            $token,
            uniqid(),
            $money
        );

        try {
            $response = $this->squareClient->getPaymentsApi()->createPayment($paymentRequest);
            return response()->json(['success' => true, 'payment' => $response->getResult()]);
        } catch (ApiException $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

}
