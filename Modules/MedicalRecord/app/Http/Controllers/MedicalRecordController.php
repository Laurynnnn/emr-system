<?php

namespace Modules\MedicalRecord\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MedicalRecord\Models\medicalRecord;
use Modules\Patient\Models\Patient;
use Modules\Lab\Models\LabTest;
use Modules\Diagnosis\Models\Diagnosis;
use Modules\Pharmacy\Models\Drug;


class MedicalRecordController extends Controller
{
    /**
     * Show the form for creating a new medical record.
     */
    public function index($patient_id = null)
    {
        if (!$patient_id) {
            return redirect()->route('patients.index')->with('error', 'Please select a patient first.');
        }

        $patient = Patient::findOrFail($patient_id);
        $medicalRecords = medicalRecord::where('patient_id', $patient_id)->paginate(10);

        return view('medicalrecord::index', compact('patient', 'medicalRecords'));
    }


    public function create(Patient $patient)
    {
        // Fetch lab tests, diagnoses, and drugs if needed
        $labTests = LabTest::all();
        $diagnoses = Diagnosis::all();
        $drugs = Drug::all();

        return view('medicalrecord::create', compact('patient', 'labTests', 'diagnoses', 'drugs'));
    }

    /**
     * Store a newly created medical record in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'nullable|exists:users,id',
            'symptoms' => 'required|string',
            'lab_tests' => 'nullable|array',
            'medical_diagnoses' => 'nullable|array',
            'treatment_given' => 'required|string',
            'outcome' => 'required|in:admitted,died,referred,discharged',
        ]);

        $medicalRecord = medicalRecord::create([
            'patient_id' => $request->input('patient_id'),
            'doctor_id' => $request->input('doctor_id'),
            'symptoms' => $request->input('symptoms'),
            'lab_tests' => json_encode($request->input('lab_tests')),
            'medical_diagnoses' => json_encode($request->input('medical_diagnoses')),
            'treatment_given' => $request->input('treatment_given'),
            'outcome' => $request->input('outcome'),
        ]);

        return redirect()->route('patients.show', $request->input('patient_id'))->with('success', 'Medical record created successfully.');
    }

    /**
     * Display the specified medical record.
     */
    public function show(medicalRecord $medicalRecord)
    {
        return view('medicalrecord::show', compact('medicalRecord'));
    }

    /**
     * Show the form for editing the specified medical record.
     */
    public function edit(medicalRecord $medicalRecord)
    {
        $labTests = LabTest::all();
        $diagnoses = Diagnosis::all();
        $drugs = Drug::all();

        return view('medicalrecord::edit', compact('medicalRecord', 'labTests', 'diagnoses', 'drugs'));
    }

    /**
     * Update the specified medical record in storage.
     */
    public function update(Request $request, medicalRecord $medicalRecord)
    {
        $request->validate([
            'symptoms' => 'required|string',
            'lab_tests' => 'nullable|array',
            'medical_diagnoses' => 'nullable|array',
            'treatment_given' => 'required|string',
            'outcome' => 'required|in:admitted,died,referred,discharged',
        ]);

        $medicalRecord->update([
            'symptoms' => $request->input('symptoms'),
            'lab_tests' => json_encode($request->input('lab_tests')),
            'medical_diagnoses' => json_encode($request->input('medical_diagnoses')),
            'treatment_given' => $request->input('treatment_given'),
            'outcome' => $request->input('outcome'),
        ]);

        return redirect()->route('patients.show', $medicalRecord->patient_id)->with('success', 'Medical record updated successfully.');
    }

    /**
     * Remove the specified medical record from storage.
     */
    public function destroy(medicalRecord $medicalRecord)
    {
        $medicalRecord->delete();

        return redirect()->route('patients.show', $medicalRecord->patient_id)->with('success', 'Medical record deleted successfully.');
    }
}
