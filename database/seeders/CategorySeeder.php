<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Gia đình";
        $category->save();

        $category = new Category();
        $category->name = "Công việc";
        $category->save();

        $category = new Category();
        $category->name = "Giải trí";
        $category->save();
    }
}
