<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KampusModel extends Model
{
    protected $table = 'kampus';
    protected $primaryKey = 'id_kampus';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kantor() {
        return $this->belongsTo(KantorModel::class, 'id_kampus', 'id_kampus');
    }

    public function perguruan_tinggi() {
        return $this->hasMany(RiwayatPendidikanModel::class, 'id_kampus', 'id_kampus');
    }

    public function bidang_ilmu() {
        return $this->hasMany(BidangIlmuModel::class, 'id_kampus', 'id_kampus');
    }

    public function penghargaan() {
        return $this->hasMany(BidangIlmuModel::class, 'id_kampus', 'id_kampus');
    }
}
