<?php

namespace App\Domains\Customer\Commands;

class CreateCustomerCommand
{
    public function __construct(
      public string $first_name,
      public string $last_name,
      public string $email,
      public string $phone_number,
      public string $bank_account_number,
      public string $date_of_birth
     )
    {
        
    }

}