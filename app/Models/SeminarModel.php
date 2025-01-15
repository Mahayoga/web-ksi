<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeminarModel extends Model
{
    protected $table = 'seminar';
    protected $primaryKey = 'id_seminar';
    public $increment = false;
    protected $keyType = 'string';

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}
