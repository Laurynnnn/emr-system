<?php

namespace Modules\Patient\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Patient\Models\Patient;
use Modules\Patient\Http\Requests\StorePatientRequest;
use Modules\Patient\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all(); // Fetch all patients
        return view('patient::index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request): RedirectResponse
    {
        // Create a new patient
        Patient::create($request->validated());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient::show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient::edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, $id): RedirectResponse
    {
        $patient = Patient::findOrFail($id);

        // Update patient with validated data
        $patient->update($request->validated());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $patient = Patient::findOrFail($id);

        // Soft delete the patient record
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }

    //Viewing inactive patients
    public function inactive()
    {
        $patients = Patient::onlyTrashed()->get();
        return view('patient::inactive', compact('patients'));
    }


    /**
     * Reactivate the specified resource.
     */
    public function reactivate($id): RedirectResponse
    {
        $patient = Patient::withTrashed()->findOrFail($id);
        $patient->restore();

        return redirect()->route('patients.inactive')->with('success', 'Patient reactivated successfully.');
    }

    public function show_inactive($id)
    {
        // Fetch the trashed patient
        $patient = Patient::onlyTrashed()->findOrFail($id);

        // Return the view with patient data
        return view('patient::show_inactive', compact('patient'));
    }


}
