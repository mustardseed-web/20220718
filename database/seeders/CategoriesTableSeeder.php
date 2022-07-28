<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param = [
        'category_name' => '家事',
    ];
    Category::create($param);
      $param = [
        'category_name' => '勉強',
    ];
    Category::create($param);
      $param = [
        'category_name' => '運動',
    ];
    Category::create($param);
      $param = [
        'category_name' => '食事',
    ];
    Category::create($param);
      $param = [
        'category_name' => '移動',
    ];
    Category::create($param);
    }
}
