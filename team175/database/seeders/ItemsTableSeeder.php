<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 登録するレコードの準備
        $items = [
            ['name' => '食パン', 'user_id' => '1', 'type' => '1'],
            ['name' => 'クロワッサン', 'user_id' => '2', 'type' => '1'],
            ['name' => 'コッペパン', 'user_id' => '3', 'type' => '1'],
            ['name' => '鮭', 'user_id' => '1', 'type' => '2'],
            ['name' => 'こんぶ', 'user_id' => '2', 'type' => '2'],
            ['name' => 'おかか', 'user_id' => '3', 'type' => '2'],
            ['name' => 'お茶', 'user_id' => '1', 'type' => '3'],
            ['name' => 'コーラ', 'user_id' => '2', 'type' => '3'],
            ['name' => 'コーヒー', 'user_id' => '3', 'type' => '3'],
        ];

        // 登録処理
        foreach ($items as $item) {
            Item::create($item);  
        }      
    }
}
