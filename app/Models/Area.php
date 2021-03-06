<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Area extends Model
{
    public function shops() {
        return $this->hasMany(Shop::class);
    }
}
