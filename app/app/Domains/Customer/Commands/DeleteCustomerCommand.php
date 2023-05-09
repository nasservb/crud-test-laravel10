<?php

namespace App\Domains\Customer\Commands;
use App\Domains\Customer\Models\Customer;

class DeleteCustomerCommand
{
    public function __construct(public Customer $customer)
    {
        
    }

}