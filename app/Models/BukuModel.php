<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_buku',
        'judul_buku',
        'tahun',
        'jumlah_halaman',
        'penerbit',
        'isbn',
        'id_staff',
    ];

    public function staff() {
        return $this->belongsTo(StaffModel::class, 'id_staff', 'id_staff');
    }
}