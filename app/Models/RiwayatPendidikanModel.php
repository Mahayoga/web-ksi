<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikanModel extends Model
{
    protected $table = 'riwayat_pendidikan';
    protected $primaryKey = 'id_riwayat';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_riwayat',
        'id_kampus',
        'id_bidang_ilmu',
        'tahun_masuk',
        'tahun_lulus',
        'lulusan',
        'id_penelitian',
        'id_staff_pembimbing',
        'id_staff_pemilik',
    ];

    public function penelitian() {
        return $this->hasOne(PenelitianModel::class, 'id_penelitian', 'id_penelitian');
    }

    public function pembimbing() {
        return $this->hasOne(StaffModel::class, 'id_staff', 'id_staff_pembimbing');
    }

    public function pemilik() {
        return $this->hasOne(StaffModel::class, 'id_staff', 'id_staff_pemilik');
    }

    public function kampus() {
        return $this->hasOne(KampusModel::class, 'id_kampus', 'id_kampus');
    }

    public function bidang_ilmu() {
        return $this->hasOne(BidangIlmuModel::class, 'id_bidang_ilmu', 'id_bidang_ilmu');
    }
}
