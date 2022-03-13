<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Shop;

class Route extends Model
{
    public function shops() {
        return $this->belongsToMany(Shop::class);
    }
}
