<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = "detail_order";

    protected $guarded = [];

    public function nama_pemesan_relation()
    {
        return $this->belongsTo('App\Pemesan', 'id_pemesan');
    }
}
