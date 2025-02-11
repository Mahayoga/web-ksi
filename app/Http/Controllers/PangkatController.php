<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use App\Models\PangkatModel;
use Illuminate\Http\Request;

class PangkatController extends Controller
{

    public function getPangkat($id) {
        $dataPangkat = JabatanModel::find($id);
        return response()->json([
            'dataPangkat' => $dataPangkat->pangkat,
            'status' => 'success'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
