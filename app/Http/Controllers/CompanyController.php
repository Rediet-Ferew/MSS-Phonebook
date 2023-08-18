<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\City;
use App\Models\Woreda;
use App\Models\Company;
use App\Models\Subcity;
use App\Models\Category;
use Illuminate\Http\Request;

class CompanyController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function getCompanies()
    {
        $companies = Company::all();
        return $this->respondSuccess($companies);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        $subcities = Subcity::all();
        $woredas = Woreda::all();
        return view('companies.create', compact('categories', 'cities', 'subcities', 'woredas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'phone' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'location' => 'required',
            'branch' => 'required',
            'city_id' => 'required|exists:cities,id',
            'subcity_id' => 'required|exists:subcities,id',
            'woreda_id' => 'required|exists:woredas,id',
        ]);
    
        Company::create($request->all());
    
        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    public function createCompany(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'phone' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'location' => 'required',
            'branch' => 'required',
            'city_id' => 'required|exists:cities,id',
            'subcity_id' => 'required|exists:subcities,id',
            'woreda_id' => 'required|exists:woredas,id',
        ]);
    
        $company = Company::create($request->all());
    
        return $this->respondSuccess($company);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.show', compact('company'));
    }

    public function getCompany($id)
    {
        $company = Company::findOrFail($id);

        return $this->respondSuccess($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $categories = Category::all();
        $cities = City::all();
        $subcities = Subcity::all();
        $woredas = Woreda::all();
        return view('companies.edit', compact('company', 'categories', 'cities', 'subcities', 'woredas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        
        $request->validate([
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'location' => 'required',
            'branch' => 'required',
            'city_id' => 'required|exists:cities,id',
            'subcity_id' => 'required|exists:subcities,id',
            'woreda_id' => 'required|exists:woredas,id',
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete the existing cover image if it exists
            if ($company->cover_image) {
                Storage::delete($company->cover_image);
            }
    
            // Store the new cover image
            $path = $request->file('cover_image')->store('public/cover_images');
            $company->cover_image = $path;
        }
    

        $company->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    public function updateCompany(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        
        $request->validate([
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'location' => 'required',
            'branch' => 'required',
            'city_id' => 'required|exists:cities,id',
            'subcity_id' => 'required|exists:subcities,id',
            'woreda_id' => 'required|exists:woredas,id',
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete the existing cover image if it exists
            if ($company->cover_image) {
                Storage::delete($company->cover_image);
            }
    
            // Store the new cover image
            $path = $request->file('cover_image')->store('public/cover_images');
            $company->cover_image = $path;
        }
    

        $company->update($request->all());

        return $this->respondSuccess($company);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }

    public function deleteCompany($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return $this->respondSuccess($company);
    }
}
