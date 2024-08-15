<?php

namespace Modules\Diagnosis\Observers;

use Modules\Diagnosis\Models\Diagnosis;
use Illuminate\Support\Facades\Auth;

class DiagnosisObserver
{
    /**
     * Handle the Diagnosis "creating" event.
     */
    public function creating(Diagnosis $diagnosis)
    {
        if (Auth::check()) {
            $diagnosis->created_by = Auth::id();
        }
    }

    /**
     * Handle the Diagnosis "updating" event.
     */
    public function updating(Diagnosis $diagnosis)
    {
        if (Auth::check()) {
            $diagnosis->updated_by = Auth::id();
        }
    }

    /**
     * Handle the Diagnosis "deleting" event.
     */
    public function deleting(Diagnosis $diagnosis)
    {
        if (Auth::check()) {
            $diagnosis->deleted_by = Auth::id();
            $diagnosis->save();
        }
    }
}
