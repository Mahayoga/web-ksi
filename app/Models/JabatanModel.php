<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JabatanModel extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    public $increment = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_jabatan',
        'nama_jabatan',
    ];

    public function pangkat() {
        return $this->hasMany(PangkatModel::class, 'id_jabatan', 'id_jabatan');
    }
}
