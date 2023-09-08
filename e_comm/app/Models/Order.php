<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(product::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}