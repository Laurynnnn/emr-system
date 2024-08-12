<?php

namespace Modules\Pharmacy\Http\Controllers;

use Modules\Pharmacy\Http\Requests\StoreDrugRequest;
use Modules\Pharmacy\Http\Requests\UpdateDrugRequest;
use Modules\Pharmacy\Models\Drug;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::paginate(10);
        return view('pharmacy::drugs.index', compact('drugs'));
    }

    public function create()
    {
        return view('pharmacy::drugs.create');
    }

    public function store(StoreDrugRequest $request): RedirectResponse
    {
        Drug::create($request->validated());
        return redirect()->route('drugs.index')->with('success', 'Drug added successfully.');
    }

    public function show(Drug $drug)
    {
        return view('pharmacy::drugs.show', compact('drug'));
    }

    public function edit(Drug $drug)
    {
        return view('pharmacy::drugs.edit', compact('drug'));
    }

    public function update(UpdateDrugRequest $request, Drug $drug): RedirectResponse
    {
        $drug->update($request->validated());
        return redirect()->route('drugs.index')->with('success', 'Drug updated successfully.');
    }

    public function destroy(Drug $drug): RedirectResponse
    {
        $drug->delete();
        return redirect()->route('drugs.index')->with('success', 'Drug deleted successfully.');
    }

    public function reactivate($id)
    {
        $drug = Drug::withTrashed()->find($id);
        $drug->restore();
        return redirect()->route('drugs.index')->with('success', 'Drug reactivated successfully.');
    }
}
