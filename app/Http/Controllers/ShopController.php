<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;

class ShopController extends Controller
{
    public function index() {
        // $area_osaka = Area::where('name', '大阪')->get()->toArray();
        // ddd($area_osaka[0]['id']);

        // $area_osaka = Area::where('name', '大阪')->first();
        // ddd($area_osaka->id, $area_osaka->name);
        // dd($area_osaka->id);

        // $area_osaka = Area::where('name', '大阪')->first();
        // $area_id = $area_osaka->id;
        // $osaka_shops = Area::find($area_id)->shops->toArray();
        // ddd($osaka_shops);

        // $osaka_shops = Area::where('name', '大阪')->first()->shops->toArray();
        // $word = 'パン';
        // $curry_area = Shop::where('shop_name', 'like', "%$word%")->first()->area->name;
        // ddd($osaka_shops, $curry_area);

        // ddd(Shop::with('area')->get()->toArray());
        // ddd(Shop::with('area:id,name')->get()->toArray());
        ddd(Shop::with('area:id,name')->where('shop_name', 'like', '%寿司%')->get()->toArray());
    }
}
