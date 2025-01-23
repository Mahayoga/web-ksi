<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenelitianModel extends Model
{
    protected $table = 'penelitian';
    protected $primaryKey = 'id_penelitian';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_penelitian',
        'id_staff',
        'judul_penelitian',
        'sumber_pendanaan',
        'tahun_penelitian',
    ];

    function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}
