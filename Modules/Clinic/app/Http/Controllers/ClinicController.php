<?php

namespace Modules\Clinic\Http\Controllers;

use Modules\Clinic\Models\Clinic;
use Illuminate\Http\Request;
use Modules\Clinic\Http\Requests\StoreClinicRequest;
use Modules\Clinic\Http\Requests\UpdateClinicRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::paginate(10); 
        return view('clinic::index', compact('clinics'));
    }

    public function create()
    {
        return view('clinic::create');
    }

    public function store(StoreClinicRequest $request)
    {
        Clinic::create($request->validated());
        return redirect()->route('clinics.index')->with('success', 'Clinic created successfully.');
    }

    public function show($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinic::show', compact('clinic'));
    }

    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinic::edit', compact('clinic'));
    }

    public function update(UpdateClinicRequest $request, $id): RedirectResponse
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->update($request->validated());
        return redirect()->route('clinics.index')->with('success', 'Clinic updated successfully.');
    }

    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'Clinic deleted successfully.');
    }

    //Viewing inactive clinics
    public function inactive()
    {
        $clinics = Clinic::onlyTrashed()->paginate(10);
        return view('clinic::inactive', compact('clinics'));
    }

    public function reactivate($id)
    {
        $clinic = clinic::withTrashed()->findOrFail($id);
        $clinic->restore();
        return redirect()->route('clinics.inactive')->with('success', 'clinic reactivated successfully.');
    }

    public function show_inactive($id)
    {
        // Fetch the trashed clinic
        $clinic = clinic::onlyTrashed()->findOrFail($id);

        // Return the view with clinic data
        return view('clinic::show_inactive', compact('clinic'));
    }
}
