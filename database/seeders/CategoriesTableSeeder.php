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
        'todo_id' => '1'
        
    ];
    Category::create($param);
      $param = [
        'category_name' => '勉強',
        'todo_id' => '2'
    ];
    Category::create($param);
      $param = [
        'category_name' => '運動',
        'todo_id' => '3'
    ];
    Category::create($param);
      $param = [
        'category_name' => '食事',
        'todo_id' => '4'
    ];
    Category::create($param);
      $param = [
        'category_name' => '移動',
        'todo_id' => '5'
    ];
    Category::create($param);
    }
}
