<?php

namespace App\Http\Controllers;

use App\Models\KampusModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StaffModel;
use App\Models\RiwayatPendidikanModel;
use App\Models\BidangIlmuModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatPendidikanController extends Controller
{
    public function getData() {
        $user = new User();
        $dataRiwayat = null;
        if($user->isAdmin()) {
            $dataRiwayat = RiwayatPendidikanModel::select()
                ->orderByDesc('created_at')
                ->get();
        } else {
            $dataRiwayat = RiwayatPendidikanModel::select()
                ->where('id_staff_pemilik', $user->getUserId())
                ->orderByDesc('created_at')
                ->get();
        }
        $dataBidangIlmu = [];
        $dataPembimbing = [];
        $dataPemilik = [];
        $dataKampus = [];
        foreach($dataRiwayat as $item) {
            $dataPembimbing[] = $item->pembimbing;
            $dataPemilik[] = $item->pemilik;
            $dataBidangIlmu[] = $item->bidang_ilmu;
            $dataKampus[] = $item->kampus;
        }
        return response()->json([
            'dataRiwayat' => $dataRiwayat,
            'dataPemilik' => $dataPemilik,
            'dataPembimbing' => $dataPembimbing,
            'dataBidangIlmu' => $dataBidangIlmu,
            'dataKampus' => $dataKampus
        ]);
    }

    public function getBidangPendidikan(string $id) {
        $dataKampus = KampusModel::find($id);
        $dataBidangIlmu = $dataKampus->bidang_ilmu;
        if(count($dataBidangIlmu) > 0) {
            return response()->json([
                'dataBidangIlmu' => $dataBidangIlmu,
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function getJenjang(string $id) {
        $dataBidangIlmu = BidangIlmuModel::find($id);
        if($dataBidangIlmu != null) {
            return response()->json([
                'dataBidangIlmu' => $dataBidangIlmu,
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function getPenelitianPemilik(string $id) {
        $dataStaff = StaffModel::find($id);
        $dataPenelitian = $dataStaff->penelitian;
        if(count($dataPenelitian) > 0) {
            return response()->json([
                'dataPenelitian' => $dataPenelitian,
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function getPembimbingNot(string $id) {
        $dataPembimbing = StaffModel::select()
            ->where('id_staff', '!=', $id)
            ->get();
        return response()->json([
            'dataPembimbing' => $dataPembimbing
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = new User();
        $dataRiwayat = null;
        if($user->isAdmin()) {
            $dataRiwayat = RiwayatPendidikanModel::select()
                ->orderByDesc('created_at')
                ->get();
        } else {
            $dataRiwayat = RiwayatPendidikanModel::select()
                ->where('id_staff_pemilik', $user->getUserId())
                ->orderByDesc('created_at')
                ->get();
        }
        $dataBidangIlmu = [];
        $dataPembimbing = [];
        $dataPemilik = [];
        $dataKampus = [];
        foreach($dataRiwayat as $item) {
            $dataPembimbing[] = $item->pembimbing;
            $dataPemilik[] = $item->pemilik;
            $dataBidangIlmu[] = $item->bidang_ilmu;
            $dataKampus[] = $item->kampus;
        }
        return view('pages.admin.user.riwayatpendidikan.index', 
        compact(
            'dataRiwayat',
            'dataPemilik',
            'dataPembimbing',
            'dataBidangIlmu',
            'dataKampus'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $dataPemilik = null;
        if($user->isAdmin()) {
            $dataPemilik = StaffModel::select()
                ->get();
        } else {
            $dataPemilik = StaffModel::select()
                ->where('id_staff', $user->getUserId())
                ->get();
        }
        $dataKampus = KampusModel::select()->get();
        return response()->json([
            'dataPemilik' => $dataPemilik,
            'dataKampus' => $dataKampus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'pemilik' => ['required', 'uuid'],
            'kampus' => ['required', 'uuid'],
            'bidangIlmu' => ['required', 'uuid'],
            'tahunMasuk' => ['required', 'integer'],
            'tahunLulus' => ['required', 'integer'],
            'gelar' => ['required', 'string'],
            'penelitian' => ['required', 'uuid'],
            'pembimbing' => ['required', 'uuid'],
        ]);
        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            RiwayatPendidikanModel::create([
                'id_riwayat' => $dataUUID,
                'id_kampus' => $request->kampus,
                'id_bidang_ilmu' => $request->bidangIlmu,
                'tahun_masuk' => $request->tahunMasuk,
                'tahun_lulus' => $request->tahunLulus,
                'lulusan' => $request->gelar,
                'id_penelitian' => $request->penelitian,
                'id_staff_pembimbing' => $request->pembimbing,
                'id_staff_pemilik' => $request->pemilik,
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
        $dataRiwayat = RiwayatPendidikanModel::find($id);
        $dataPenelitian = $dataRiwayat->penelitian;
        $dataBidangIlmu = $dataRiwayat->bidang_ilmu;
        $dataPembimbing = $dataRiwayat->pembimbing;
        $dataPemilik = $dataRiwayat->pemilik;
        $dataKampus = $dataRiwayat->kampus;
        return response()->json([
            'dataRiwayat' => $dataRiwayat,
            'dataPemilik' => $dataPemilik,
            'dataPembimbing' => $dataPembimbing,
            'dataBidangIlmu' => $dataBidangIlmu,
            'dataKampus' => $dataKampus,
            'dataPenelitian' => $dataPenelitian
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataRiwayat = RiwayatPendidikanModel::find($id);
        $dataPemilik = $dataRiwayat->pemilik;
        $dataKampus = KampusModel::select()
            ->where('id_kampus', '!=', $dataRiwayat->id_kampus)
            ->get();
        $dataIlmu = $dataRiwayat->bidang_ilmu;
        $dataPenelitianEdit = $dataRiwayat->penelitian;
        $dataPembimbingEdit = $dataRiwayat->pembimbing;
        return response()->json([
            'dataRiwayat' => $dataRiwayat,
            'dataPemilik' => $dataPemilik,
            'dataKampusEdit' => $dataRiwayat->kampus,
            'dataBidangIlmuEdit' => $dataRiwayat->bidang_ilmu,
            'dataPenelitianEdit' => $dataPenelitianEdit,
            'dataPembimbingEdit' => $dataPembimbingEdit,

            'dataKampus' => $dataKampus,
            'dataIlmu' => BidangIlmuModel::select()
                ->where('id_bidang_ilmu', '!=', $dataRiwayat->id_bidang_ilmu)
                ->where('id_kampus', '=', $dataRiwayat->id_kampus)
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'pemilik' => ['required', 'uuid'],
            'kampus' => ['required', 'uuid'],
            'bidangIlmu' => ['required', 'uuid'],
            'tahunMasuk' => ['required', 'integer'],
            'tahunLulus' => ['required', 'integer'],
            'gelar' => ['required', 'string'],
            'penelitian' => ['required', 'uuid'],
            'pembimbing' => ['required', 'uuid'],
        ]);

        try {
            $dataRiwayat = RiwayatPendidikanModel::find($id);
            $dataRiwayat->update([
                'id_riwayat' => $id,
                'id_kampus' => $request->kampus,
                'id_bidang_ilmu' => $request->bidangIlmu,
                'tahun_masuk' => $request->tahunMasuk,
                'tahun_lulus' => $request->tahunLulus,
                'lulusan' => $request->gelar,
                'id_penelitian' => $request->penelitian,
                'id_staff_pembimbing' => $request->pembimbing,
                'id_staff_pemilik' => $request->pemilik,
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
            RiwayatPendidikanModel::destroy($id);
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
