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
                'name' => 'Keycaps Keyboard',
                'image' => 'storage/category-cover/cherry-cover.jpg'
            ],
            [
                'name' => '61 Key Keyboard',
                'image' => 'storage/category-cover/61-cover.jpg'
            ],
            [
                'name' => '87 Key Keyboard',
                'image' => 'storage/category-cover/87-cover.jpg'
            ],
            [
                'name' => 'Full Size Keyboard',
                'image' => 'storage/category-cover/full-size-cover.png'
            ],
            [
                'name' => 'Non-Mecha Keyboard',
                'image' => 'storage/category-cover/non-mechanical-cover.png'
            ],
            [
                'name' => 'Low Profile Keyboard',
                'image' => 'storage/category-cover/low-profile-cover.png'
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
