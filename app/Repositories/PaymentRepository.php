<?php

namespace App\Repositories;

use App\Payment;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function getAll()
    {
        return Payment::all();
    }

    public function find($id){
        return $payment;
    }
}