<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }


    public function getRegions()
    {
        $regions = Region::all();

        return $this->respond($regions);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $region = Region::create($request->all());

        return redirect()->route('regions.index')->with('success', 'Region created successfully.');
    }

    public function createRegion(Request $request)
    {
        $region = Region::create($request->all());

        return $this->respondSuccess($region);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::findOrFail($id);

        return view('regions.show', compact('region'));
    }

    public function getRegion($id)
    {
        $region = Region::findOrFail($id);

        return $this->respondSuccess($region);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::findOrFail($id);

        return view('regions.edit', compact('region'));
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
        $region = Region::findOrFail($id);

        $region->update($request->all());

        return redirect()->route('regions.index')->with('success', 'Region updated successfully.');
    }

    public function updateRegion(Request $request, $id)
    {
        $region = Region::findOrFail($id);

        $region->update($request->all());

        return $this->respondSuccess($region);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::findOrFail($id);

        $region->delete();

        return redirect()->route('regions.index')->with('success', 'Region deleted successfully.');
    }

    public function deleteRegion($id)
    {
        $region = Region::findOrFail($id);

        $region->delete();

        return $this->respondSuccess($region);
    }
}
