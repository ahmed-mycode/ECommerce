<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => 1,
            'name' => 'Ahmed',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
