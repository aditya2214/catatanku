<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    protected $table = "pemesans";
    protected $guarded = [];

    public function detail_order_relation()
    {
        return $this->hasOne('App\DetailOrder', 'id_pemesan');
    }
}
