<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kantor() {
        return $this->hasMany(KantorModel::class, 'id_kantor', 'id_kantor');
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
}
