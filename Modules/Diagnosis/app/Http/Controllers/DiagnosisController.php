<?php

namespace Modules\Diagnosis\Http\Controllers;

use Modules\Diagnosis\Models\Diagnosis;
use Modules\Diagnosis\Http\Requests\StoreDiagnosisRequest;
use Modules\Diagnosis\Http\Requests\UpdateDiagnosisRequest;
use Illuminate\Routing\Controller;

class DiagnosisController extends Controller
{
    public function index()
    {
        $diagnoses = Diagnosis::paginate(10);
        return view('diagnosis::index', compact('diagnoses'));
    }

    public function create()
    {
        return view('diagnosis::create');
    }

    public function store(StoreDiagnosisRequest $request)
    {
        Diagnosis::create($request->validated());
        return redirect()->route('diagnoses.index')->with('success', 'Diagnosis created successfully.');
    }

    public function show($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return view('diagnosis::show', compact('diagnosis'));
    }

    public function edit($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return view('diagnosis::edit', compact('diagnosis'));
    }

    public function update(UpdateDiagnosisRequest $request, $id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->update($request->validated());
        return redirect()->route('diagnoses.index')->with('success', 'Diagnosis updated successfully.');
    }


    public function destroy($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->delete();
        return redirect()->route('diagnoses.index')->with('success', 'Diagnosis deleted successfully.');
    }

    //Viewing inactive diagnosiss
    public function inactive()
    {
        $diagnoses = Diagnosis::onlyTrashed()->paginate(10);
        return view('diagnosis::inactive', compact('diagnoses'));
    }

    public function reactivate($id)
    {
        $diagnosis = Diagnosis::withTrashed()->findOrFail($id);
        $diagnosis->restore();
        return redirect()->route('diagnoses.inactive')->with('success', 'diagnosis reactivated successfully.');
    }

    public function show_inactive($id)
    {
        // Fetch the trashed diagnosis
        $diagnosis = Diagnosis::onlyTrashed()->findOrFail($id);

        // Return the view with diagnosis data
        return view('diagnosis::show_inactive', compact('diagnosis'));
    }
}
