<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\StaffModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function getNameAndGelar() {
        $dataStaff = StaffModel::find(Auth::user()->id_staff);
        return response()->json([
            'status' => 'success',
            'nama_lengkap' => $dataStaff->nama_lengkap,
            'gelar_depan' => $dataStaff->gelar_depan,
            'gelar_belakang' => $dataStaff->gelar_belakang
        ]);
    }

    public function updateProfileImage(Request $request) {
        try {
            $dataStaff = StaffModel::find(Auth::user()->id_staff);
            $oldFile = public_path() . '/storage/' . $dataStaff->profile_image;
            if(is_file($oldFile) && !str_contains($oldFile, 'default_profile.png')) {
                Storage::delete($oldFile);
                $prepareFile = $request->file('profile_image');
                $filePath = $prepareFile->store('assets/img/staff', 'public');
                $dataStaff->update([
                    'profile_image' => $filePath
                ]);
                return response()->json([
                    'status' => 'success',
                    'path' => $filePath
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'File tidak ditemukan!',
                    'path' => $oldFile
                ]);
            }
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataStaff = StaffModel::find(Auth::user()->id_staff);
        $dataKantor = $dataStaff->kantor;
        $dataKampus = $dataKantor->kampus;
        return view('pages.admin.user.profile.index', 
            compact('dataStaff',
                'dataKantor',
                'dataKampus',
            )
        );
    }
    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            "nama_lengkap" => ['required', 'string'],
            "gelar_depan" => ['required', 'string'],
            "gelar_belakang" => ['required', 'string'],
            "nip" => ['required', 'string'],
            "nidn" => ['required', 'string'],
            "jabatan_fungsional" => ['required', 'string'],
            "jenis_kelamin" => ['required', 'string'],
            "tempat_lahir" => ['required', 'string'],
            "tanggal_lahir" => ['required', 'date'],
            "nomor_telepon" => ['required', 'string'],
            "fax" => ['required', 'string']
        ]);
        
        try {
            $dataStaff = StaffModel::find($id);
            $dataStaff->update([
                "nama_lengkap" => $request->nama_lengkap,
                "gelar_depan" => $request->gelar_depan,
                "gelar_belakang" => $request->gelar_belakang,
                "NIP" => $request->nip,
                "NIDN" => $request->nidn,
                "jabatan_fungsional" => $request->jabatan_fungsional,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "nomor_telepon" => $request->nomor_telepon,
                "fax" => $request->fax
            ]);
            return response()->json([
                'status' => 'success',
                'dataStaff' => $dataStaff
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
