<?php

namespace Modules\Clinic\Observers;

use Modules\Clinic\Models\Clinic;
use Illuminate\Support\Facades\Auth;

class ClinicObserver
{
    /**
     * Handle the Clinic "creating" event.
     */
    public function creating(Clinic $clinic)
    {
        if (Auth::check()) {
            $clinic->created_by = Auth::id();
        }
    }

    /**
     * Handle the Clinic "updating" event.
     */
    public function updating(Clinic $clinic)
    {
        if (Auth::check()) {
            $clinic->updated_by = Auth::id();
        }
    }

    /**
     * Handle the Clinic "deleting" event.
     */
    public function deleting(Clinic $clinic)
    {
        if (Auth::check()) {
            $clinic->deleted_by = Auth::id();
            $clinic->save();
        }
    }
}
