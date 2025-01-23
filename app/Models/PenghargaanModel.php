<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenghargaanModel extends Model
{
    protected $table = 'penghargaan';
    protected $primaryKey = 'id_penghargaan';
    public $increment = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_penghargaan',
        'jenis_penghargaan',
        'id_kampus',
        'penghargaan',
        'tahun',
        'id_staff',
    ];

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }

    public function kampus() {
        return $this->belongsTo(KampusModel::class, 'id_kampus', 'id_kampus');
    }
}
