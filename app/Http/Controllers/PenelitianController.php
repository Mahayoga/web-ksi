<?php

namespace App\Http\Controllers;

use App\Models\PenelitianModel;
use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenelitianController extends Controller
{

    public function getPenelitian() {
        $dataPenelitian = PenelitianModel::select()->get();
        $dataStaff = [];
        foreach($dataPenelitian as $item) {
            $dataStaff[] = $item->staff;
        }

        return response()->json([
            'status' => 'success',
            'dataPenelitian' => $dataPenelitian,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPenelitian = PenelitianModel::select()->get();
        $dataStaff = [];
        foreach($dataPenelitian as $item) {
            $dataStaff[] = $item->staff;
        }

        return view('pages.admin.user.penelitian.index', compact('dataPenelitian', 'dataStaff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataStaff = StaffModel::select()->get();
        return response()->json([
            'status' => 'success',
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_pemilik' => ['required', 'uuid'],
            'judul_penelitian' => ['required', 'string'],
            'sumber_pendanaan' => ['required', 'string'],
            'tahun_penelitian' => ['required', 'integer'],
        ]);

        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            PenelitianModel::create([
                'id_penelitian' => $dataUUID,
                'id_staff' => $request->nama_pemilik,
                'judul_penelitian' => $request->judul_penelitian,
                'sumber_pendanaan' => $request->sumber_pendanaan,
                'tahun_penelitian' => $request->tahun_penelitian
            ]);
            return response()->json([
                'status' => 'success',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataPenelitian = PenelitianModel::find($id);
        $dataStaff = $dataPenelitian->staff;

        return response()->json([
            'status' => 'success',
            'dataPenelitian' => $dataPenelitian,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataPenelitian = PenelitianModel::find($id);
        $dataStaff = $dataPenelitian->staff;

        return response()->json([
            'status' => 'success',
            'dataPenelitian' => $dataPenelitian,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_pemilik' => ['required', 'uuid'],
            'judul_penelitian' => ['required', 'string'],
            'sumber_pendanaan' => ['required', 'string'],
            'tahun_penelitian' => ['required', 'integer'],
        ]);

        try {
            $dataPenelitian = PenelitianModel::find($id);
            $dataPenelitian->update([
                'id_staff' => $request->nama_pemilik,
                'judul_penelitian' => $request->judul_penelitian,
                'sumber_pendanaan' => $request->sumber_pendanaan,
                'tahun_penelitian' => $request->tahun_penelitian
            ]);
            return response()->json([
                'status' => 'success',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            PenelitianModel::destroy($id);
            return response()->json([
                'status' => 'success'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e->getMessage()
            ]);
        }
    }
}
