<?php

namespace App\Domains\Customer\Queries;

use App\Domains\Customer\Models\Customer;

class GetCustomerByEmailQuery
{

    public function __construct(public string $email)
    {
    }

    public function getData(): array
    {
        return Customer::query()->where('email', $this->email)->first();
    }
}