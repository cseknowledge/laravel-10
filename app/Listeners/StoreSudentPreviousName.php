<?php

namespace App\Listeners;

use App\Events\StudentNameUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\StudentVersion;

class StoreSudentPreviousName
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
     * @param  \App\Events\StudentNameUpdate  $event
     * @return void
     */
    public function handle(StudentNameUpdate $event)
    {
        StudentVersion::create($event->student);
    }
}
