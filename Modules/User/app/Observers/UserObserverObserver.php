<?php

namespace Modules\User\Observers;

use Modules\User\app\Models\UserObserver;

class UserObserverObserver
{
    /**
     * Handle the UserObserver "created" event.
     */
    public function created(UserObserver $userobserver): void
    {
        //
    }

    /**
     * Handle the UserObserver "updated" event.
     */
    public function updated(UserObserver $userobserver): void
    {
        //
    }

    /**
     * Handle the UserObserver "deleted" event.
     */
    public function deleted(UserObserver $userobserver): void
    {
        //
    }

    /**
     * Handle the UserObserver "restored" event.
     */
    public function restored(UserObserver $userobserver): void
    {
        //
    }

    /**
     * Handle the UserObserver "force deleted" event.
     */
    public function forceDeleted(UserObserver $userobserver): void
    {
        //
    }
}
