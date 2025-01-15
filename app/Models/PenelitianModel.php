<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenelitianModel extends Model
{
    protected $table = 'penelitian';
    protected $primaryKey = 'id_penelitian';
    public $incrementing = false;
    protected $keyType = 'string';

    function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}
