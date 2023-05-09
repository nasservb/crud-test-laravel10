<?php

namespace App\Domains\Customer\Commands;

use App\Domains\Customer\Models\Customer;

class DeleteCustomerHandler
{
    public function __invoke(DeleteCustomerCommand $command)
    {        
        $command->customer->delete();
    }
}
