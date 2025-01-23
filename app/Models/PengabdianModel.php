<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengabdianModel extends Model
{
    protected $table = 'pengabdian';
    protected $primaryKey = 'id_pengabdian';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_pengabdian',
        'id_staff',
        'judul_pengabdian',
        'sumber_pendanaan',
        'tahun',
    ];

    public function staff() {
        return $this->hasOne(StaffModel::class, 'id_staff', 'id_staff');
    }
}
