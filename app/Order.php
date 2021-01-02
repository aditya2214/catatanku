<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";

    protected $guarded = [];

    public function brand_relation()
    {
        return $this->belongsTo('App\Brand', 'brand');
    }

    public function ukuran_relation()
    {
        return $this->belongsTo('App\Ukuran', 'ukuran');
    }
}
