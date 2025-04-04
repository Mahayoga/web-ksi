<?php

namespace App\Http\Controllers;

use App\Models\SeminarModel;
use App\Models\StaffModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeminarController extends Controller
{

    public function getSeminar() {
        $user = new User();
        $dataSeminar = null;
        if($user->isAdmin()) {
            $dataSeminar = SeminarModel::select()->get();
        } else {
            $dataSeminar = SeminarModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        foreach($dataSeminar as $item) {
            $dataStaff[] = $item->staff;
        }

        return response()->json([
            'status' => 'success',
            'dataSeminar' => $dataSeminar,
            'dataStaff' => $dataStaff,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = new User();
        $dataSeminar = null;
        if($user->isAdmin()) {
            $dataSeminar = SeminarModel::select()->get();
        } else {
            $dataSeminar = SeminarModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataStaff = [];
        foreach($dataSeminar as $item) {
            $dataStaff[] = $item->staff;
        }

        return view('pages.admin.user.seminar.index', compact('dataSeminar', 'dataStaff'));
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
            'nama_pertemuan' => ['required', 'string'],
            'judul_seminar' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
            'tempat' => ['required', 'string'],
            'link_seminar' => ['required', 'string'],
        ]);

        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            SeminarModel::create([
                'id_seminar' => $dataUUID,
                'nama_pertemuan' => $request->nama_pertemuan,
                'judul_seminar' => $request->judul_seminar,
                'tahun' => $request->tahun,
                'tempat' => $request->tempat,
                'link_seminar' => $request->link_seminar,
                'id_staff' => $request->nama_pemilik,
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
        $dataSeminar = SeminarModel::find($id);
        $dataStaff = $dataSeminar->staff;

        return response()->json([
            'status' => 'success',
            'dataSeminar' => $dataSeminar,
            'dataStaff' => $dataStaff,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataSeminar = SeminarModel::find($id);
        $dataStaff = $dataSeminar->staff;

        return response()->json([
            'status' => 'success',
            'dataSeminar' => $dataSeminar,
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
            'nama_pertemuan' => ['required', 'string'],
            'judul_seminar' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
            'tempat' => ['required', 'string'],
            'link_seminar' => ['required', 'string'],
        ]);

        try {
            $dataSeminar = SeminarModel::find($id);
            $dataSeminar->update([
                'nama_pertemuan' => $request->nama_pertemuan,
                'judul_seminar' => $request->judul_seminar,
                'tahun' => $request->tahun,
                'tempat' => $request->tempat,
                'link_seminar' => $request->link_seminar,
                'id_staff' => $request->nama_pemilik,
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
            SeminarModel::destroy($id);
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
