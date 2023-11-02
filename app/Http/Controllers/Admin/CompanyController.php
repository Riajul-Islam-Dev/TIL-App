<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new company
        $data = $request->validate([
            'name' => 'required|string',
            'company_id' => 'required|string|unique:companies,company_id',
            'address' => 'string|nullable',
            'phone' => 'string|nullable',
            'status' => 'integer',
        ]);

        $company = Company::create($data);

        return redirect()->route('admin.companies.index');
    }

    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // Validate and update the company
        $data = $request->validate([
            'name' => 'required|string',
            'company_id' => 'required|string|unique:companies,company_id,' . $company->id,
            'address' => 'string|nullable',
            'phone' => 'string|nullable',
            'status' => 'integer',
        ]);

        $company->update($data);

        return redirect()->route('admin.companies.index');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('admin.companies.index');
    }
}
