<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    public $increment = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_artikel',
        'judul_artikel',
        'nama_jurnal',
        'tahun',
        'volume_nomor',
        'link_artikel',
        'id_staff',
    ];

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}
