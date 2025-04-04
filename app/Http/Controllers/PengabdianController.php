<?php

namespace App\Http\Controllers;

use App\Models\PengabdianModel;
use App\Models\StaffModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengabdianController extends Controller
{

    public function getPengabdian() {
        $user = new User();
        $dataPengabdian = null;
        if($user->isAdmin()) {
            $dataPengabdian = PengabdianModel::select()->get();
        } else {
            $dataPengabdian = PengabdianModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        foreach($dataPengabdian as $item) {
            $dataStaff[] = $item->staff;
        }

        return response()->json([
            'status' => 'success',
            'dataPengabdian' => $dataPengabdian,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = new User();
        $dataPengabdian = null;
        if($user->isAdmin()) {
            $dataPengabdian = PengabdianModel::select()->get();
        } else {
            $dataPengabdian = PengabdianModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        foreach($dataPengabdian as $item) {
            $dataStaff[] = $item->staff;
        }

        return view('pages.admin.user.pengabdian.index', compact('dataPengabdian', 'dataStaff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $dataStaff = null;
        if($user->isAdmin()) {
            $dataStaff = StaffModel::select()->get();
        } else {
            $dataStaff = StaffModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
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
            'judul_pengabdian' => ['required', 'string'],
            'sumber_pendanaan' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
        ]);

        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            PengabdianModel::create([
                'id_pengabdian' => $dataUUID,
                'id_staff' => $request->nama_pemilik,
                'judul_pengabdian' => $request->judul_pengabdian,
                'sumber_pendanaan' => $request->sumber_pendanaan,
                'tahun' => $request->tahun,
            ]);
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataPengabdian = PengabdianModel::find($id);
        $dataStaff = $dataPengabdian->staff;

        return response()->json([
            'status' => 'success',
            'dataPengabdian' => $dataPengabdian,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataPengabdian = PengabdianModel::find($id);
        $dataStaff = $dataPengabdian->staff;

        return response()->json([
            'status' => 'success',
            'dataPengabdian' => $dataPengabdian,
            'dataStaff' => $dataStaff,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_pemilik' => ['required', 'uuid'],
            'judul_pengabdian' => ['required', 'string'],
            'sumber_pendanaan' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
        ]);

        try {
            $dataPengabdian = PengabdianModel::find($id);
            $dataPengabdian->update([
                'id_staff' => $request->nama_pemilik,
                'judul_pengabdian' => $request->judul_pengabdian,
                'sumber_pendanaan' => $request->sumber_pendanaan,
                'tahun' => $request->tahun,
            ]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            PengabdianModel::destroy($id);
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
