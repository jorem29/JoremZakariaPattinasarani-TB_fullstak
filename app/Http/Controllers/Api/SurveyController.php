<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyStock;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveyStocks = SurveyStock::all();
        return response()->json($surveyStocks);
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
            'user_id' => 'required',
            'barang_id' => 'required',
            'outlet_id' => 'required',
            'jumlah_stok' => 'required|integer',
            'jumlah_display' => 'required|integer',
        ]);

        // Mendapatkan pengguna yang sedang login
        // $user = Auth::user();
        // $validatedData['user_id'] = $user->id;

        $surveyStock = SurveyStock::create($validatedData);

        return response()->json($surveyStock, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surveyStock = SurveyStock::find($id);

        if (!$surveyStock) {
            return response()->json(['message' => 'SurveyStock not found'], 404);
        }

        return response()->json($surveyStock);
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
            'user_id' => 'required',
            'barang_id' => 'required',
            'outlet_id' => 'required',
            'jumlah_stok' => 'required|integer',
            'jumlah_display' => 'required|integer',
            'visit_datetime' => 'required|date',
        ]);

        $surveyStock = SurveyStock::find($id);

        if (!$surveyStock) {
            return response()->json(['message' => 'SurveyStock not found'], 404);
        }

        $surveyStock->update($validatedData);

        return response()->json($surveyStock, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surveyStock = SurveyStock::find($id);

        if (!$surveyStock) {
            return response()->json(['message' => 'SurveyStock not found'], 404);
        }

        $surveyStock->delete();

        return response()->json(['message' => 'SurveyStock deleted successfully'], 200);
    }
}
