<?php

use App\Role;
use App\User;
use App\Product;
use App\Category;
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
        Role::truncate();
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'User']);

        User::truncate();
        factory(User::class, 100)->create();

        Category::truncate();
        factory(Category::class, 20)->create();

        Product::truncate();
        factory(Product::class, 10)->create();
    }


}
