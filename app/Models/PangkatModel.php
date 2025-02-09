<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PangkatModel extends Model
{
    protected $table = 'pangkat';
    protected $primaryKey = 'id_pangkat';
    public $increment = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_pangkat',
        'nama_pangkat',
        'golongan',
        'angka_kredit',
        'id_jabatan'
    ];

    public function jabatan() {
        return $this->hasOne(JabatanModel::class, 'id_jabatan', 'id_jabatan');
    }
}
