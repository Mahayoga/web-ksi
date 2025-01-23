<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HKIModel extends Model
{
    protected $table = 'hki';
    protected $primaryKey = 'id_hki';
    public $increment = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_hki',
        'id_staff',
        'judul_hki',
        'tanggal',
        'jenis',
        'nomor_p',
        'nomor_id',
        'link_hki',
    ];

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}
