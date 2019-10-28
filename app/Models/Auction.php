<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{

    protected $fillable = [
      'active','end_time','product_id','start_time'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
