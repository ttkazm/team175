<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 登録するレコードの準備
        $types = [
            ['type_name' => 'パン'],
            ['type_name' => 'おにぎり'],
            ['type_name' => '飲み物'],
            ['type_name' => 'バーガー'],
        ];

        // 登録処理
        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
