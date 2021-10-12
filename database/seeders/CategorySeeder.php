<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'categoryName' => '61 Key Keyboard',
                'categoryImage' => 'category-images/61key.jpg'
            ],
            [
                'categoryName' => '87 Key Keyboard',
                'categoryImage' => 'category-images/87key.jpg'
            ],
            [
                'categoryName' => 'XDA Profile Keyboard',
                'categoryImage' => 'category-images/xdakey.png'
            ],
            [
                'categoryName' => 'Cherry Profile keyboard',
                'categoryImage' => 'category-images/cherrykey.jpg'
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
