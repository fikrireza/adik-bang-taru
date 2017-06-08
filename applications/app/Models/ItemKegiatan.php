<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemKegiatan extends Model
{
    protected $table = "adik_item_kegiatan";

    public function kegiatan()
    {
      return $this->belongsTo('App\Models\Kegiatan', 'id_kegiatan');
    }

    public function pencairan()
    {
      return $this->hasMany('App\Models\Pencairan');
    }
}
