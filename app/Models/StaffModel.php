<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_staff',
        'nama_lengkap',
        'gelar_depan',
        'gelar_belakang',
        'jenis_kelamin',
        'id_pangkat',
        'NIP',
        'NIDN',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_telepon',
        'fax',
        'alamat',
        'id_kantor',
        'profile_image',
        'profile_mime_type'
    ];

    public function kantor() {
        return $this->hasOne(KantorModel::class, 'id_kantor', 'id_kantor');
    }

    public function riwayat_pendidikan() {
        return $this->hasMany(RiwayatPendidikanModel::class, 'id_staff_pemilik', 'id_staff');
    }

    public function penelitian() {
        return $this->hasMany(PenelitianModel::class, 'id_staff', 'id_staff');
    }

    public function pengabdian() {
        return $this->hasMany(PengabdianModel::class, 'id_staff', 'id_staff');
    }

    public function artikel() {
        return $this->hasMany(ArtikelModel::class, 'id_staff', 'id_staff');
    }

    public function seminar() {
        return $this->hasMany(SeminarModel::class, 'id_staff', 'id_staff');
    }

    public function buku() {
        return $this->hasMany(BukuModel::class, 'id_staff', 'id_staff');
    }
    public function hki() {
        return $this->hasMany(HKIModel::class, 'id_staff', 'id_staff');
    }

    public function penghargaan() {
        return $this->hasMany(PenghargaanModel::class, 'id_staff', 'id_staff');
    }

    public function users() {
        return $this->hasOne(UserModel::class, 'id_staff', 'id_staff');
    }

    public function pangkat() {
        return $this->hasOne(PangkatModel::class, 'id_pangkat', 'id_pangkat');
    }


    // Method count data pemilik staff
    public static function countPublikasi($id) {
        $hasil = ArtikelModel::selectRaw("COUNT(*) as jumlah")
            ->where("id_staff", $id)
            ->get();
        return $hasil[0];
    }

    public static function countPaten($id) {
        $hasil = HKIModel::selectRaw("COUNT(*) as jumlah")
            ->where("id_staff", $id)
            ->get();
        return $hasil[0];
    }

    // Prototipe ??
    public static function countPrototipe($id) {
        // $hasil = HKIModel::selectRaw("COUNT(*) as jumlah")
        //     ->where("id_staff", $id)
        //     ->get();
        // return $hasil[0];
        return ["jumlah" => 0];
    }

    public static function countPenelitian($id) {
        $hasil = PenelitianModel::selectRaw("COUNT(*) as jumlah")
            ->where("id_staff", $id)
            ->get();
        return $hasil[0];
    }

    public static function countPengabdian($id) {
        $hasil = PengabdianModel::selectRaw("COUNT(*) as jumlah")
            ->where("id_staff", $id)
            ->get();
        return $hasil[0];
    }
}
