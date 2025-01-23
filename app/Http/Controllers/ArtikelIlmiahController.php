<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelIlmiahController extends Controller
{

    public function getArtikelIlmiah() {
        $dataArtikel = ArtikelModel::select()->get();
        $dataStaff = [];
        foreach($dataArtikel as $item) {
            $dataStaff[] = $item->staff;
        }
        return response()->json([
            'status' => 'success',
            'dataArtikel' => $dataArtikel,
            'dataStaff' => $dataStaff
        ]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataArtikel = ArtikelModel::select()
            ->get();
        $dataStaff = [];
        foreach($dataArtikel as $item) {
            $dataStaff[] = $item->staff;
        }
        return view('pages.admin.user.artikelilmiah.index', compact('dataArtikel', 'dataStaff'));
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
            'judul_artikel' => ['required', 'string'],
            'nama_jurnal' => ['required', 'string'],
            'tahun_artikel' => ['required', 'integer'],
            'volume_nomor' => ['required', 'string'],
            'link_artikel' => ['required', 'string']
        ]);

        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            ArtikelModel::create([
                'id_artikel' => $dataUUID,
                'judul_artikel' => $request->judul_artikel,
                'nama_jurnal' => $request->nama_jurnal,
                'tahun' => $request->tahun_artikel,
                'volume_nomor' => $request->volume_nomor,
                'link_artikel' => $request->link_artikel,
                'id_staff' => $request->nama_pemilik,
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $dataArtikel = ArtikelModel::find($id);
            $dataStaff = $dataArtikel->staff;

            return response()->json([
                'status' => 'success',
                'dataArtikel' => $dataArtikel,
                'dataStaff' => $dataStaff
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataArtikel = ArtikelModel::select()
            ->get();
        $dataStaff = StaffModel::select()
            ->get();
        $dataArtikelEdit = ArtikelModel::find($id);
        $dataStaffEdit = $dataArtikelEdit->staff;
        return response()->json([
            'status' => 'success',
            'dataArtikelEdit' => $dataArtikelEdit,
            'dataStaffEdit' => $dataStaffEdit,

            'dataArtikel' => $dataArtikel,
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
            'judul_artikel' => ['required', 'string'],
            'nama_jurnal' => ['required', 'string'],
            'tahun_artikel' => ['required', 'integer'],
            'volume_nomor' => ['required', 'string'],
            'link_artikel' => ['required', 'string']
        ]);

        try {
            $dataArtikel = ArtikelModel::find($id);
            $dataArtikel->update([
                'judul_artikel' => $request->judul_artikel,
                'nama_jurnal' => $request->nama_jurnal,
                'tahun' => $request->tahun_artikel,
                'volume_nomor' => $request->volume_nomor,
                'link_artikel' => $request->link_artikel,
                'id_staff' => $request->nama_pemilik,
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            ArtikelModel::destroy($id);
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
