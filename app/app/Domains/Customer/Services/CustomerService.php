<?php

namespace App\Domains\Customer\Services;

use App\CommandBus;
use App\Domains\Customer\Http\Requests\CustomerRequest;
use App\Domains\Customer\Commands\CreateCustomerCommand;
use App\Domains\Customer\Commands\UpdateCustomerCommand;
use App\Domains\Customer\Commands\DeleteCustomerCommand;
use App\Domains\Customer\Events\CreateCustomerEvent;
use App\Domains\Customer\Events\UpdateCustomerEvent;
use App\Domains\Customer\Events\DeleteCustomerEvent;
use App\Domains\Customer\Queries\GetCustomerByEmailQuery;
use App\Domains\Customer\Queries\GetCustomers;
use App\Domains\Customer\Models\Customer;

class CustomerService
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createCustomer(CustomerRequest $request): Customer
    {
        $createCustomerCommand =
          new CreateCustomerCommand(
              $request->first_name,
              $request->last_name,
              $request->email,
              $request->phone_number,
              $request->bank_account_number,
              $request->date_of_birth
          );

        $this->commandBus->handle($createCustomerCommand);
        event(new CreateCustomerEvent($createCustomerCommand));

        $query = new GetCustomerByEmailQuery($request->email);
        return $query->getData();
    }

    public function getCustomers()
    {
        $query = new GetCustomers();
        return $query->getData();
    }

    public function updateCustomer(CustomerRequest $request, Customer $customer)
    {
        $updateCustomerCommand =
          new UpdateCustomerCommand(
              $customer,
              $request->first_name,
              $request->last_name,
              $request->email,
              $request->phone_number,
              $request->bank_account_number,
              $request->date_of_birth
          );

        $this->commandBus->handle($updateCustomerCommand);
        event(new UpdateCustomerEvent($updateCustomerCommand));
    }

    public function deleteCustomer(Customer $customer)
    {
        $deleteCustomerCommand = new DeleteCustomerCommand($customer);
        $this->commandBus->handle($deleteCustomerCommand);
        event(new DeleteCustomerEvent($deleteCustomerCommand));
    }
}
