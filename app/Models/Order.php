<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobil;
use App\Models\User;
use App\Models\Travel;
use App\Models\Wisata;

class Order extends Model
{
    protected $guarded = ['id'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
