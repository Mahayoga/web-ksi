<?php

namespace App\Http\Controllers;

use App\Models\KampusModel;
use App\Models\PenghargaanModel;
use App\Models\StaffModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenghargaanController extends Controller
{

    public function getPenghargaan() {
        $user = new User();
        $dataPenghargaan = null;
        if($user->isAdmin()) {
            $dataPenghargaan = PenghargaanModel::select()->get();
        } else {
            $dataPenghargaan = PenghargaanModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        $dataKampus = [];
        foreach($dataPenghargaan as $item) {
            $dataStaff[] = $item->staff;
            $dataKampus[] = $item->kampus;
        }

        return response()->json([
            'status' => 'success',
            'dataPenghargaan' => $dataPenghargaan,
            'dataStaff' => $dataStaff,
            'dataKampus' => $dataKampus
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = new User();
        $dataPenghargaan = null;
        if($user->isAdmin()) {
            $dataPenghargaan = PenghargaanModel::select()->get();
        } else {
            $dataPenghargaan = PenghargaanModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        $dataKampus = [];
        foreach($dataPenghargaan as $item) {
            $dataStaff[] = $item->staff;
            $dataKampus[] = $item->kampus;
        }

        return view('pages.admin.user.penghargaan.index', compact('dataPenghargaan', 'dataStaff', 'dataKampus'));
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
        $dataKampus = KampusModel::select()->get();

        return response()->json([
            'status' => 'success',
            'dataStaff' => $dataStaff,
            'dataKampus' => $dataKampus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_pemilik' => ['required', 'uuid'],
            'jenis_penghargaan' => ['required', 'string'],
            'pemberi' => ['required', 'uuid'],
            'penghargaan' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
        ]);

        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            PenghargaanModel::create([
                'id_penghargaan' => $dataUUID,
                'jenis_penghargaan' => $request->jenis_penghargaan,
                'id_kampus' => $request->pemberi,
                'penghargaan' => $request->penghargaan,
                'tahun' => $request->tahun,
                'id_staff' => $request->nama_pemilik,
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
        $dataPenghargaan = PenghargaanModel::find($id);
        $dataStaff = $dataPenghargaan->staff;
        $dataKampus = $dataPenghargaan->kampus;

        return response()->json([
            'status' => 'success',
            'dataPenghargaan' => $dataPenghargaan,
            'dataStaff' => $dataStaff,
            'dataKampus' => $dataKampus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataPenghargaan = PenghargaanModel::find($id);
        $dataStaff = $dataPenghargaan->staff;
        $dataKampus = KampusModel::select()->get();

        return response()->json([
            'status' => 'success',
            'dataPenghargaan' => $dataPenghargaan,
            'dataStaff' => $dataStaff,
            'dataKampus' => $dataKampus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_pemilik' => ['required', 'uuid'],
            'jenis_penghargaan' => ['required', 'string'],
            'pemberi' => ['required', 'uuid'],
            'penghargaan' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
        ]);

        try {
            $dataPenghargaan = PenghargaanModel::find($id);
            $dataPenghargaan->update([
                'jenis_penghargaan' => $request->jenis_penghargaan,
                'id_kampus' => $request->pemberi,
                'penghargaan' => $request->penghargaan,
                'tahun' => $request->tahun,
                'id_staff' => $request->nama_pemilik,
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
            PenghargaanModel::destroy($id);
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
