<?php

namespace Modules\Pharmacy\Observers;

use Modules\Pharmacy\Models\Drug;
use Illuminate\Support\Facades\Auth;

class DrugObserver
{
    /**
     * Handle the Drug "creating" event.
     */
    public function creating(Drug $drug)
    {
        if (Auth::check()) {
            $drug->created_by = Auth::id();
        }
    }

    /**
     * Handle the Drug "updating" event.
     */
    public function updating(Drug $drug)
    {
        if (Auth::check()) {
            $drug->updated_by = Auth::id();
        }
    }

    /**
     * Handle the Drug "deleting" event.
     */
    public function deleting(Drug $drug)
    {
        if (Auth::check()) {
            $drug->deleted_by = Auth::id();
            $drug->save();
        }
    }
}
