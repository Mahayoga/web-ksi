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
}
