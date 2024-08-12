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

    public function show(Diagnosis $diagnosis)
    {
        return view('diagnosis::show', compact('diagnosis'));
    }

    public function edit(Diagnosis $diagnosis)
    {
        return view('diagnosis::edit', compact('diagnosis'));
    }

    public function update(UpdateDiagnosisRequest $request, Diagnosis $diagnosis)
    {
        $diagnosis->update($request->validated());
        return redirect()->route('diagnoses.index')->with('success', 'Diagnosis updated successfully.');
    }


    public function destroy(Diagnosis $diagnosis)
    {
        $diagnosis->delete();
        return redirect()->route('diagnoses.index')->with('success', 'Diagnosis deleted successfully.');
    }
}
