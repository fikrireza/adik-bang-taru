<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = "adik_program";

    public function kegiatan()
    {
      return $this->hasMany('App\Models\Kegiatan');
    }
}
