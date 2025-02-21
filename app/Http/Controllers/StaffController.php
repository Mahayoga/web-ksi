<?php

namespace App\Http\Controllers;

use App\Models\KantorModel;
use App\Models\StaffModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function getStaff() {
        $dataStaff = StaffModel::select()->get();
        $dataKantor = [];
        $dataUser = [];
        $dataPangkat = [];
        $dataJabatan = [];
        foreach($dataStaff as $item) {
            $dataKantor[] = $item->kantor;
            $dataUser[] = $item->users;
            $dataPangkat[] = $item->pangkat;
            if($item->pangkat != null) {
                $dataJabatan[] = $item->pangkat->jabatan;
            } else {
                $dataJabatan[] = null;
            }
        }

        return response()->json([
            'status' => 'success',
            'dataStaff' => $dataStaff,
            'dataKantor' => $dataKantor,
            'dataUser' => $dataUser,
            'dataPangkat' => $dataPangkat,
            'dataJabatan'=> $dataJabatan
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataStaff = StaffModel::select()->get();
        $dataKantor = [];
        $dataUser = [];
        foreach($dataStaff as $item) {
            $dataKantor[] = $item->kantor;
            $dataUser[] = $item->users;
        }

        return view('pages.admin.user.staff.index', compact('dataStaff', 'dataKantor', 'dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataStaff = StaffModel::select()->get();
        $dataKantor = KantorModel::select()->get();

        return response()->json([
            'status' => 'success',
            'dataStaff' => $dataStaff,
            'dataKantor' => $dataKantor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_lengkap' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'nama_kantor' => ['required', 'uuid'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        try {
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            StaffModel::create([
                // id_staff
                // nama_lengkap
                // gelar_depan
                // gelar_belakang
                // jenis_kelamin
                // id_pangkat
                // NIP
                // NIDN
                // tempat_lahir
                // tanggal_lahir
                // nomor_telepon
                // fax
                // alamat
                // deskripsi
                // profile_image
                'id_staff' => $dataUUID,
                'nama_lengkap' => $request->nama_lengkap,
                'gelar_depan' => null,
                'gelar_belakang' => null,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_pangkat' => null,
                'NIP' => null,
                'NIDN' => null,
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'nomor_telepon' => null,
                'fax' => null,
                'alamat' => null,
                'deskripsi' => null,
                'id_kantor' => $request->nama_kantor,
                'profile_image' => 'assets/img/staff/default_profile.png',
            ]);
            $dataStaff = StaffModel::find($dataUUID);
            $dataUUID = DB::select('SELECT UUID() as hehe')[0]->hehe;
            UserModel::create([
                'id' => $dataUUID,
                'name' => $dataStaff->nama_lengkap,
                'email' => $request->email,
                'password' => password_hash($request->password, PASSWORD_BCRYPT, ['cost' => 12]),
                'id_staff' => $dataStaff->id_staff,
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
        $dataStaff = StaffModel::find($id);
        $dataUser = $dataStaff->users;
        $dataKantor = $dataStaff->kantor;
        $dataPangkat = $dataStaff->pangkat;
        $dataJabatan = null;
        if($dataStaff->pangkat != null) {
            $dataJabatan = $dataStaff->pangkat->jabatan;
        }

        return response()->json([
            'status' => 'success',
            'dataStaff' => $dataStaff,
            'dataUser' => $dataUser,
            'dataKantor' => $dataKantor,
            'dataPangkat'=> $dataPangkat,
            'dataJabatan'=> $dataJabatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataStaff = StaffModel::find($id);
        $dataKantor = KantorModel::select()->get();
        $dataUser = $dataStaff->users;

        return response()->json([
            'status' => 'success',
            'dataStaff' => $dataStaff,
            'dataKantor' => $dataKantor,
            'dataUser' => $dataUser
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_lengkap' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'nama_kantor' => ['required', 'uuid'],
            'email' => ['required', 'email'],
        ]);
        try {
            $dataStaff = StaffModel::find($id);
            $dataStaff->update([
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_kantor' => $request->nama_kantor
            ]);
            $dataUser = $dataStaff->users;
            if($request->password != null) {
                $dataUser->update([
                    'name' => $request->nama_lengkap,
                    'email' => $request->email,
                    'password' => password_hash($request->password, PASSWORD_BCRYPT, ['cost' => 12]),
                    'id_staff' => $dataStaff->id_staff,
                ]);
            } else {
                $dataUser->update([
                    'name' => $request->nama_lengkap,
                    'email' => $request->email,
                    'id_staff' => $dataStaff->id_staff,
                ]);
            }
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
            $dataStaff = StaffModel::find($id);
            $dataUser = $dataStaff->users;
            UserModel::destroy($dataUser->id);
            StaffModel::destroy($id);
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
