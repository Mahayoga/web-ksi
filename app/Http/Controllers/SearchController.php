<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffModel;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $key = request()->key;
        $dataStaff = StaffModel::select()
            ->where('nama_lengkap', 'like', '%' . $key . '%')
            ->get();
        $dataJumlah = StaffModel::selectRaw('COUNT(*) as jumlah')
            ->where('nama_lengkap', 'like', '%' . $key . '%')
            ->get();
        // dd($dataJumlah[0]->jumlah);
        return view('pages.user.search.index', compact('dataStaff', 'dataJumlah', 'key'));
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
