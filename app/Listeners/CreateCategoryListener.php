<?php

namespace App\Listeners;

use App\Events\CreateCategoryEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCategoryListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateCategoryEvent $event): void
    {
        session()->flash('message', 'Category Created: ' . $event->name);
    }
}
