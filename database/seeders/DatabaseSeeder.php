<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersTableSeeder::class);
      $this->call(JenisSaranaTableSeeder::class);
      $this->call(LokasiTableSeeder::class);
      $this->call(OperatorTableSeeder::class);
      $this->call(KeteranganTableSeeder::class);
      $this->call(ExcelTableSeeder::class);
      $this->call(TargetTableSeeder::class);
    }
}
