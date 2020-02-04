<?php

use App\Role;
use App\User;
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
        DB::table('roles')->truncate();
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'User']);

        factory(User::class, 100)->create();
    }


}
