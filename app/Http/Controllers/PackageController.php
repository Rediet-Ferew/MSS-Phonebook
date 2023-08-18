<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }
    public function getPackages()
    {
        $packages = Package::all();
        return $this->respondSuccess($packages);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
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
            'package_term' => 'required',
            'package_price' => 'required|numeric',
        ]);

        Package::create($request->all());

        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    public function createPackage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'package_term' => 'required',
            'package_price' => 'required|numeric',
        ]);

        $package = Package::create($request->all());

        return $this->respondSuccess($package);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::findOrFail($id);

        return view('packages.show', compact('package'));
    }

    public function getPackage($id)
    {
        $package = Package::findOrFail($id);

        return $this->respondSuccess($package);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('packages.edit', compact('package'));
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

        $package = Package::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'package_term' => 'required',
            'package_price' => 'required|numeric',
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function updatePackage(Request $request, $id)
    {

        $package = Package::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'package_term' => 'required',
            'package_price' => 'required|numeric',
        ]);

        $package->update($request->all());

        return $this->respondSuccess($package);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    
    }

    public function deletePackage($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return $this->respondSuccess($package);
    
    }
}
