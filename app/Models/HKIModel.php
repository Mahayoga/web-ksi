<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HKIModel extends Model
{
    protected $table = 'hki';
    protected $primaryKey = 'id_hki';
    public $increment = false;
    protected $keyType = 'string';

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}
