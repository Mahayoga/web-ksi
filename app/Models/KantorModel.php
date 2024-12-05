<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KantorModel extends Model
{
    protected $table = 'kantor';
    protected $primaryKey = 'id_kantor';
    public $incrementing = false;
    protected $keyType = 'string';

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_kantor', 'id_kantor');
    }

    public function kampus() {
        return $this->hasMany(KampusModel::class, 'id_kampus', 'id_kampus');
    }
}
