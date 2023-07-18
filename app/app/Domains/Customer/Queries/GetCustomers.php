<?php

namespace App\Domains\Customer\Queries;

use App\Domains\Customer\Models\Customer;

class GetCustomers
{

    public function __construct()
    {
    }

    public function getData()
    {
        return Customer::query()->paginate();
    }
}