<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    public $incrementing = false;
    protected $keyType = 'string';

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}