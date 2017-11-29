<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Repositories\PaymentRepositoryInterface;

class PaymentController extends Controller
{

    public $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {  
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {   
        $data = $this->paymentRepository->getAll(); 

        return $data;
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
