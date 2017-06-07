<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPegawai extends Model
{
    protected $table = 'master_pegawai';

    protected $fillable = ['nip_sapk', 'nama', 'flag_status'];

}
