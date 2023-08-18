<?php

namespace App\Http\Controllers;

use App\Models\Woreda;
use App\Models\Subcity;
use Illuminate\Http\Request;

class WoredaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $woredas = Woreda::all();
        return view('woredas.index', compact('woredas'));
    }

    public function getWoredas()
    {
        $woredas = Woreda::all();
        return $this->respondSuccess($woredas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcities = Subcity::all();
        return view('woredas.create', compact('subcities'));
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
            'subcity_id' => 'required|exists:subcities,id',
        ]);

        Woreda::create($request->all());

        return redirect()->route('woredas.index')
            ->with('success', 'Woreda created successfully.');
    }


    public function createWoreda(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'subcity_id' => 'required|exists:subcities,id',
        ]);

        $woreda = Woreda::create($request->all());

        return $this->respondSuccess($woreda);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $woreda = Woreda::findOrFail($id);

        return view('woredas.show', compact('woreda'));
    }

    public function getWoreda($id)
    {
        $woreda = Woreda::findOrFail($id);

        return $this->respondSuccess($woreda);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $woreda = Woreda::findOrFail($id);
        $subcities = Subcity::all();
        return view('woredas.edit', compact('woreda', 'subcities'));
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
        $woreda = Woreda::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'subcity_id' => 'required|exists:subcities,id',
        ]);

        $woreda->update($request->all());

        return redirect()->route('woredas.index')
            ->with('success', 'Woreda updated successfully.');
    }

    public function updateWoreda(Request $request, $id)
    {
        $woreda = Woreda::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'subcity_id' => 'required|exists:subcities,id',
        ]);

        $woreda->update($request->all());

        return $this->respondSuccess($woreda);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $woreda = Woreda::findOrFail($id);
        $woreda->delete();

        return redirect()->route('woredas.index')
            ->with('success', 'Woreda deleted successfully.');
    }

    public function deleteWoreda($id)
    {
        $woreda = Woreda::findOrFail($id);
        $woreda->delete();

        return $this->respondSuccess($woreda);
    }
}
