<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
  * Загрузка начальных данных.
  *
  * @return void
  */
  public function run()
  {
    $this->call(UsersTableSeeder::class);
    $this->call(RecipesTableSeeder::class);
  }
}