<?php

namespace App\Domains\Customer\Commands;

use App\Domains\Customer\Models\Customer;

class CreateCustomerHandler
{
    public function __invoke(CreateCustomerCommand $command)
    {
        $customer = new Customer();
        $customer->first_name = $command->first_name;
        $customer->last_name = $command->last_name;
        $customer->email = $command->email;
        $customer->phone_number = $command->phone_number;
        $customer->bank_account_number = $command->bank_account_number;
        $customer->date_of_birth = $command->date_of_birth;
        $customer->save();
    }
}
