<?php

namespace App\Domains\Customer\Queries;

use App\Domains\Customer\Models\Customer;

class GetCustomerByEmailQuery
{

    public function __construct(public string $email)
    {
    }

    public function getData(): Customer
    {
        return Customer::query()->where('email', $this->email)->first();
    }
}