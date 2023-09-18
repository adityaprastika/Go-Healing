<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Wisata extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
