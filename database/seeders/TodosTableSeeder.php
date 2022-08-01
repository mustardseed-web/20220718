<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param = [
        'title' => 'サンプル１',
        'user_id' => '1',
        'category_id' => '1',
    ];
      Todo::create($param);
      $param = [
        'title' => 'サンプル2',
        'user_id' => '2',
        'category_id' => '2',
    ];
      Todo::create($param);
      $param = [
        'title' => 'サンプル3',
        'user_id' => '3',
        'category_id' => '3',
    ];
    Todo::create($param);
    }
}
