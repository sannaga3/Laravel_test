<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Route;

class Shop extends Model
{
    // use HasFactory;
    public function area() {
        return  $this->belongsTo(Area::class);
    }

    public function routes() {
        return $this->belongsToMany(Route::class);
    }
}
