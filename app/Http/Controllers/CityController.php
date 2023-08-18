<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class CityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function getCities()
    {
        $cities = City::all();
        return $this->respondSuccess($cities);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('cities.create', compact('regions'));
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
            'region_id' => 'required|exists:regions,id',
        ]);

        City::create($request->all());

        return redirect()->route('cities.index')
            ->with('success', 'City created successfully.');
    }

    public function createCity(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);

        $city = City::create($request->all());

        return $this->respondSuccess($city);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::findOrFail($id);

        return view('cities.show', compact('city'));
    }

    public function getCity($id)
    {
        $city = City::findOrFail($id);

        return $this->respondSuccess($city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $city = City::findOrFail($id);
        $regions = Region::all();
        return view('cities.edit', compact('city', 'regions'));
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
        $city = City::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);

        $city->update($request->all());

        return redirect()->route('cities.index')
            ->with('success', 'City updated successfully.');
    }


    public function updateCity(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);

        $city->update($request->all());

        return $this->respondSuccess($city);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index')
            ->with('success', 'City deleted successfully.');
    }
    public function deleteCity($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return $this->respondSuccess($city);
    }
}
