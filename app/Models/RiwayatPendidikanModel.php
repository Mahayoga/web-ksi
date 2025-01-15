<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikanModel extends Model
{
    protected $table = 'riwayat_pendidikan';
    protected $primaryKey = 'id_riwayat';
    public $incrementing = false;
    protected $keyType = 'string';

    public function penelitian() {
        return $this->hasOne(PenelitianModel::class, 'id_penelitian', 'id_penelitian');
    }

    public function pembimbing() {
        return $this->hasOne(StaffModel::class, 'id_staff', 'id_staff_pembimbing');
    }

    public function pemilik() {
        return $this->hasOne(StaffModel::class, 'id_staff', 'id_staff_pemilik');
    }
}
