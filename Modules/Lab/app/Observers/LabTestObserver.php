<?php

namespace Modules\Lab\Observers;

use Modules\Lab\Models\LabTest;
use Illuminate\Support\Facades\Auth;

class LabTestObserver
{
    /**
     * Handle the LabTest "creating" event.
     */
    public function creating(LabTest $labTest)
    {
        if (Auth::check()) {
            $labTest->created_by = Auth::id();
        }
    }

    /**
     * Handle the LabTest "updating" event.
     */
    public function updating(LabTest $labTest)
    {
        if (Auth::check()) {
            $labTest->updated_by = Auth::id();
        }
    }

    /**
     * Handle the LabTest "deleting" event.
     */
    public function deleting(LabTest $labTest)
    {
        if (Auth::check()) {
            $labTest->deleted_by = Auth::id();
            $labTest->save();
        }
    }
}
