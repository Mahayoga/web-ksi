<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenghargaanModel extends Model
{
    protected $table = 'penghargaan';
    protected $primaryKey = 'id_penghargaan';
    public $increment = false;
    protected $keyType = 'string';

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}
