<?php

namespace Modules\Patient\Observers;

use Modules\Patient\Models\Patient;
use Illuminate\Support\Facades\Auth;

class PatientObserver
{
    /**
     * Handle the Patient "creating" event.
     */
    public function creating(Patient $patient)
    {
        if (Auth::check()) {
            $patient->created_by = Auth::id();
        }
    }

    /**
     * Handle the Patient "updating" event.
     */
    public function updating(Patient $patient)
    {
        if (Auth::check()) {
            $patient->updated_by = Auth::id();
        }
    }

    /**
     * Handle the Patient "deleting" event.
     */
    public function deleting(Patient $patient)
    {
        if (Auth::check()) {
            $patient->deleted_by = Auth::id();
            $patient->save();
        }
    }
}
