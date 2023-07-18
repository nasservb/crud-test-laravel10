<?php

namespace App\Domains\Customer\Commands;

use App\Domains\Customer\Models\Customer;

class UpdateCustomerHandler
{
    public function __invoke(UpdateCustomerCommand $command)
    {
        $customer =  $command->customer;
        $customer->first_name = $command->first_name;
        $customer->last_name = $command->last_name;
        $customer->email = $command->email;
        $customer->phone_number = $command->phone_number;
        $customer->bank_account_number = $command->bank_account_number;
        $customer->date_of_birth = $command->date_of_birth;
        $customer->update();
    }
}
