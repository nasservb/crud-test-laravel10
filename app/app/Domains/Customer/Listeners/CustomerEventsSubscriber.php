<?php

namespace App\Domains\Customer\Listeners;

use App\Domains\Customer\Events\CreateCustomerEvent;
use App\Domains\Customer\Jobs\SendCustomerWelcomeNotificationJob;

class CustomerEventsSubscriber
{
    public function onCustomerCreation($event)
    {
        SendCustomerWelcomeNotificationJob::dispatch($event->customer);
    }

    public function subscribe($events)
    {
        $events->listen(CreateCustomerEvent::class, __CLASS__ . '@onCustomerCreation');
    }
}
