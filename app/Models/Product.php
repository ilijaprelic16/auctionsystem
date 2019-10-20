<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
      'name','description','starting_price','user_id'
    ];

    public function user()
    {
     return $this->belongsTo(User::class);
    }
}
