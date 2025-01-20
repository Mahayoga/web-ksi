<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffModel;
use App\Models\RiwayatPendidikanModel;
use Illuminate\Support\Facades\Auth;

class RiwayatPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataStaff = StaffModel::find(Auth::user()->id_staff);
        $dataRiwayat = $dataStaff->riwayat_pendidikan;
        $dataPembimbing = [];
        foreach($dataRiwayat as $item) {
            $dataPembimbing[] = $item->pembimbing;
        }
        // dd($dataPembimbing);
        return view('pages.admin.user.riwayatpendidikan.index', compact('dataRiwayat', 'dataPembimbing'));
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
