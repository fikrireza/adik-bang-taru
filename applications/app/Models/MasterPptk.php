<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPptk extends Model
{
  protected $table = 'master_pptk';

  protected $fillable = ['nip_sapk','nama','id_bidang','id_aktor','flag_status'];

  public function bidang()
  {
      return $this->belongsTo('App\Models\MasterBidang', 'id_bidang');
  }
}
