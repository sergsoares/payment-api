<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
    public function index()
    {   
        return Payment::all();
    }

    public function show(Payment $payment)
    {   
        return $payment;
    }
    
    public function destroy($id)
    {
        Payment::find($id)->delete();

        return response()->json(null, 204);
    }

    public function update(Payment $payment)
    {
        $payment->update(request()->all());

        return response()->json($payment, 200);
    }

    public function store()
    {
        $payment = Payment::create(request()->all());

        return $payment;
    }
}
