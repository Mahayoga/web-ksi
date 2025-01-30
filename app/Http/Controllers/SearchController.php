<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffModel;
use App\Models\KantorModel;
use App\Models\PenelitianModel;
use App\Models\RiwayatPendidikanModel;
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
        $dataKantor = StaffModel::selectRaw('*, COUNT(*) as jumlah')
            ->join('kantor', 'kantor.id_kantor', '=', 'staff.id_kantor')
            ->where('nama_lengkap', 'like', '%' . $key . '%')
            ->groupBy('staff.id_kantor')
            ->get();
        $resultData = [];
        foreach($dataStaff as $item) {
            $resultData[] = [
                'dataStaff' => $item,
                'dataPublikasi' => StaffModel::countPublikasi($item->id_staff),
                'dataPaten' => StaffModel::countPaten($item->id_staff),
                'dataPrototipe' => StaffModel::countPrototipe($item->id_staff),
                'dataPenelitian' => StaffModel::countPenelitian($item->id_staff),
                'dataPengabdian' => StaffModel::countPengabdian($item->id_staff),
            ];
        }
        return view('pages.user.search.index', compact( 'dataJumlah', 'key', 'resultData', 'dataKantor', 'dataStaff'));
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
        $dataStaff = StaffModel::find($id);
        $dataKampus = $dataStaff->kantor;
        $dataRiwayatPendidikan = $dataStaff->riwayat_pendidikan;
        $dataPenelitian = $dataStaff->penelitian;
        $dataPengabdian = $dataStaff->pengabdian;
        $dataArtikel = $dataStaff->artikel;
        $dataSeminar = $dataStaff->seminar;
        $dataBuku = $dataStaff->buku;
        $dataHKI = $dataStaff->hki;
        $dataPenghargaan = $dataStaff->penghargaan;
        return view('pages.user.search.show', compact(
            'dataStaff', 
            'dataKampus',
            'dataRiwayatPendidikan',
            'dataPenelitian',
            'dataPengabdian', 
            'dataArtikel', 
            'dataSeminar',
            'dataBuku',
            'dataHKI',
            'dataPenghargaan'
        ));
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
