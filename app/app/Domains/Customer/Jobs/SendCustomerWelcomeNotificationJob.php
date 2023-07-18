<?php
 
 namespace App\Domains\Customer\Jobs;
 
use App\Domains\Customer\Commands\CreateCustomerCommand;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class SendCustomerWelcomeNotificationJob implements ShouldQueue
{
 
    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'customer_notification';
 
    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 60;

    /**
    * Reward a gift card to the customer.
    */
    public function handle(CreateCustomerCommand $customer): void
    {
        // send the welcome gift card to the customer $customer->email
    }
}