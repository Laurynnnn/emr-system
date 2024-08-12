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

    public function show(Clinic $clinic)
    {
        return view('clinic::show', compact('clinic'));
    }

    public function edit(Clinic $clinic)
    {
        return view('clinic::edit', compact('clinic'));
    }

    public function update(UpdateClinicRequest $request, Clinic $clinic): RedirectResponse
    {
        $clinic->update($request->validated());
        return redirect()->route('clinics.index')->with('success', 'Clinic updated successfully.');
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'Clinic deleted successfully.');
    }
}
