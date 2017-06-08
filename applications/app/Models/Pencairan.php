<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    protected $table = "adik_pencairan";

    public function item_kegiatan()
    {
      return $this->belongsTo('App\Models\ItemKegiatan', 'id_item_kegiatan');
    }
}
