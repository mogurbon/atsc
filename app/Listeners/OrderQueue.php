<?php

namespace App\Listeners;

use App\Events\QueueSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\queueatc;

class OrderQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  QueueSaved  $event
     * @return void
     */
    public function handle(QueueSaved $event)
    {

    }
}
