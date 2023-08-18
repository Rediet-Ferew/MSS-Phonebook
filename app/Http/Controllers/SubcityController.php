<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Subcity;
use Illuminate\Http\Request;

class SubcityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcities = Subcity::all();
        return view('subcities.index', compact('subcities'));
    }

    public function getSubcities()
    {
        $subcities = Subcity::all();
        return $this->respondSuccess($subcities);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('subcities.create', compact('cities'));
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
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
        ]);
    
        Subcity::create($request->all());

        return redirect()->route('subcities.index')
            ->with('success', 'Subcity created successfully.');
    }

    public function createSubcity(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
        ]);
    
        $subcity = Subcity::create($request->all());
        return $this->respondSuccess($subcity);

        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcity = SubCity::findOrFail($id);

        return view('subcities.show', compact('subcity'));
    }

    public function getSubcity($id)
    {
        $subcity = SubCity::findOrFail($id);

        return $this->respondSuccess($subcity);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcity = Subcity::findOrFail($id);
        $cities = City::all();
        return view('subcities.edit', compact('subcity', 'cities'));
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

        $subcity = Subcity::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
        ]);

        $subcity->update($request->all());

        return redirect()->route('subcities.index')
            ->with('success', 'Subcity updated successfully.');
    }


    public function updateSubcity(Request $request, $id)
    {

        $subcity = Subcity::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
        ]);

        $subcity->update($request->all());

        return $this->respondSuccess($subcity);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcity = Subcity::findOrFail($id);
        $subcity->delete();

        return redirect()->route('subcities.index')
            ->with('success', 'Subcity deleted successfully.');
    }

    public function deleteSubcity($id)
    {
        $subcity = Subcity::findOrFail($id);
        $subcity->delete();

        return $this->respondSuccess($subcity);
    }
}
