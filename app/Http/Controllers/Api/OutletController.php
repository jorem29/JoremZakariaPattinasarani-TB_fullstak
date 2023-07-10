<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = outlet::all();
        return response()->json($outlets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_outlet' => 'required',
        ]);

        $outlet = outlet::create($validatedData);

        return response()->json($outlet, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outlet = outlet::find($id);

        if (!$outlet) {
            return response()->json(['message' => 'Outlet not found'], 404);
        }

        return response()->json($outlet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validatedData = $request->validate([
            'nama_outlet' => 'required',
        ]);

        $outlet = outlet::find($id);

        if (!$outlet) {
            return response()->json(['message' => 'Outlet not found'], 404);
        }

        $outlet->update($validatedData);

        return response()->json($outlet, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = outlet::find($id);

        if (!$outlet) {
            return response()->json(['message' => 'Outlet not found'], 404);
        }

        $outlet->delete();

        return response()->json(['message' => 'Outlet deleted successfully'], 200);
    }
}
