<?php

namespace Modules\Lab\Http\Controllers;

use Modules\Lab\Models\LabTest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Lab\Http\Requests\StoreLabTestRequest;
use Modules\Lab\Http\Requests\UpdateLabTestRequest;

class LabTestController extends Controller
{
    public function index()
    {
        $labTests = LabTest::all();
        return view('lab::index', compact('labTests'));
    }

    public function create()
    {
        return view('lab::create');
    }

    public function store(StoreLabTestRequest $request)
    {
        LabTest::create($request->validated());
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test created successfully.');
    }

    public function show(LabTest $labTest)
    {
        return view('lab::show', compact('labTest'));
    }

    public function edit(LabTest $labTest)
    {
        return view('lab::edit', compact('labTest'));
    }

    public function update(UpdateLabTestRequest $request, LabTest $labTest)
    {
        $labTest->update($request->validated());
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test updated successfully.');
    }

    public function destroy(LabTest $labTest)
    {
        $labTest->delete();
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test deleted successfully.');
    }
}
