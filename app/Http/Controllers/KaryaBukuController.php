<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryaBukuController extends Controller
{

    public function getKaryaBuku() {
        $dataBuku = BukuModel::select()->get();
        $dataStaff = [];
        foreach($dataBuku as $item) {
            $dataStaff[] = $item->staff;
        }

        return response()->json([
            'status' => 'success',
            'dataBuku' => $dataBuku,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBuku = BukuModel::select()->get();
        $dataStaff = [];
        foreach($dataBuku as $item) {
            $dataStaff[] = $item->staff;
        }
        return view('pages.admin.user.karyabuku.index', compact('dataBuku', 'dataStaff'));
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
            'judul_buku' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
            'jumlah_halaman' => ['required', 'integer'],
            'penerbit' => ['required', 'string'],
            'isbn' => ['required', 'string'],
        ]);

        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            BukuModel::create([
                'id_buku' => $dataUUID,
                'judul_buku' => $request->judul_buku,
                'tahun' => $request->tahun,
                'jumlah_halaman' => $request->jumlah_halaman,
                'penerbit' => $request->penerbit,
                'isbn' => $request->isbn,
                'id_staff' => $request->nama_pemilik,
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'success',
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataBuku = BukuModel::find($id);
        $dataStaff = $dataBuku->staff;
        
        return response()->json([
            'status' => 'success',
            'dataBuku' => $dataBuku,
            'dataStaff' => $dataStaff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataBuku = BukuModel::find($id);
        $dataStaff = $dataBuku->staff;

        return response()->json([
            'status' => 'success',
            'dataBuku' => $dataBuku,
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
            'judul_buku' => ['required', 'string'],
            'tahun' => ['required', 'integer'],
            'jumlah_halaman' => ['required', 'integer'],
            'penerbit' => ['required', 'string'],
            'isbn' => ['required', 'string'],
        ]);

        try {
            $dataBuku = BukuModel::find($id);
            $dataBuku->update([
                'judul_buku' => $request->judul_buku,
                'tahun' => $request->tahun,
                'jumlah_halaman' => $request->jumlah_halaman,
                'penerbit' => $request->penerbit,
                'isbn' => $request->isbn,
                'id_staff' => $request->nama_pemilik,
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'success',
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
            BukuModel::destroy($id);
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
