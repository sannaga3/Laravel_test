<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'id' => 1,
                'shop_name' => 'パン屋',
                'area_id' => 1,
            ],
            [
                'id' => 2,
                'shop_name' => '回転寿司',
                'area_id' => 2,
            ],
            [
                'id' => 3,
                'shop_name' => 'スーパーマーケット',
                'area_id' => 3,
            ],
            [
                'id' => 4,
                'shop_name' => 'カレー屋',
                'area_id' => 2,
            ]
        ]);
    }
}
