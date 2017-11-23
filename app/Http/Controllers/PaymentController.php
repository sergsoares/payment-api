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
}
