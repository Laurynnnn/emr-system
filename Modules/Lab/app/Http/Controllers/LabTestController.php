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

    public function show($id)
    {
        $labTest = LabTest::findOrFail($id);
        return view('lab::show', compact('labTest'));
    }

    public function edit($id)
    {
        $labTest = LabTest::findOrFail($id);
        return view('lab::edit', compact('labTest'));
    }

    public function update(UpdateLabTestRequest $request, $id)
    {
        $labTest = LabTest::findOrFail($id);
        $labTest->update($request->validated());
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test updated successfully.');
    }

    public function destroy($id)
    {
        $labTest = LabTest::findOrFail($id);
        $labTest->delete();
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test deleted successfully.');
    }
    public function inactive()
    {
        $labTests = LabTest::onlyTrashed()->get();
        return view('lab::inactive', compact('labTests'));
    }


    /**
     * Reactivate the specified resource.
     */
    public function reactivate($id)
    {
        $labTest = LabTest::withTrashed()->findOrFail($id);
        $labTest->restore();

        return redirect()->route('labTests.inactive')->with('success', 'LabTest reactivated successfully.');
    }

    public function show_inactive($id)
    {
        // Fetch the trashed labTest
        $labTest = LabTest::onlyTrashed()->findOrFail($id);

        // Return the view with labTest data
        return view('lab::show_inactive', compact('labTest'));
    }
}
