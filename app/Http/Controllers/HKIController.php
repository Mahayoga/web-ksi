<?php

namespace App\Http\Controllers;

use App\Models\HKIModel;
use App\Models\StaffModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HKIController extends Controller
{

    public function getHKI() {
        $user = new User();
        $dataHKI = null;
        if($user->isAdmin()) {
            $dataHKI = HKIModel::select()->get();
        } else {
            $dataHKI = HKIModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        foreach($dataHKI as $item) {
            $dataStaff[] = $item->staff;
        }

        return response()->json([
            'status' => 'success',
            'dataHKI' => $dataHKI,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = new User();
        $dataHKI = null;
        if($user->isAdmin()) {
            $dataHKI = HKIModel::select()->get();
        } else {
            $dataHKI = HKIModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        foreach($dataHKI as $item) {
            $dataStaff[] = $item->staff;
        }
        return view('pages.admin.user.hki.index', compact('dataHKI', 'dataStaff'));
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
            'judul_hki' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'jenis' => ['required', 'string'],
            'nomor_p' => ['required', 'string'],
            'nomor_id' => ['required', 'string'],
            'link_hki' => ['required', 'string'],
        ]);
        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            HKIModel::create([
                'id_hki' => $dataUUID,
                'id_staff' => $request->nama_pemilik,
                'judul_hki' => $request->judul_hki,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenis,
                'nomor_p' => $request->nomor_p,
                'nomor_id' => $request->nomor_id,
                'link_hki' => $request->link_hki,
            ]);
            return response()->json([
                'status' => 'success'
            ]);
        } catch(\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'msg' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataHKI = HKIModel::find($id);
        $dataStaff = $dataHKI->staff;

        return response()->json([
            'status' => 'success',
            'dataHKI' => $dataHKI,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataHKI = HKIModel::find($id);
        $dataStaff = $dataHKI->staff;

        return response()->json([
            'status' => 'success',
            'dataHKI' => $dataHKI,
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
            'judul_hki' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'jenis' => ['required', 'string'],
            'nomor_p' => ['required', 'string'],
            'nomor_id' => ['required', 'string'],
            'link_hki' => ['required', 'string'],
        ]);
        try {
            $dataHKI = HKIModel::find($id);
            $dataHKI->update([
                'id_staff' => $request->nama_pemilik,
                'judul_hki' => $request->judul_hki,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenis,
                'nomor_p' => $request->nomor_p,
                'nomor_id' => $request->nomor_id,
                'link_hki' => $request->link_hki,
            ]);
            return response()->json([
                'status' => 'success'
            ]);
        } catch(\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'msg' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            HKIModel::destroy($id);
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
