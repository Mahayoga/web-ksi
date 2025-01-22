<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangIlmuModel extends Model
{
    protected $table = 'bidang_ilmu';
    protected $primaryKey = 'id_bidang_ilmu';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kampus() {
        return $this->hasOne(KampusModel::class, 'id_kampus', 'id_kampus');
    }
}
