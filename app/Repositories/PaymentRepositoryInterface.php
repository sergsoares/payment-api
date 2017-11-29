<?php

namespace App\Repositories;

interface PaymentRepositoryInterface
{
    
    public function getAll();

    public function find($id);
}
