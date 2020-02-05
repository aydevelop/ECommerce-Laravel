<?php

use App\Role;
use App\User;
use App\Order;
use App\Product;
use App\Category;
use App\OrderStatus;
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
        OrderStatus::truncate();
        OrderStatus::create(['name'=>'new']);
        OrderStatus::create(['name'=>'completed']);
        OrderStatus::create(['name'=>'canceled']);

        Role::truncate();
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'User']);

        User::truncate();
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('adminadmin'),
        ]);
        factory(User::class, 10)->create();

        Category::truncate();
        factory(Category::class, 10)->create();

        Product::truncate();
        factory(Product::class, 30)->create();

        Order::truncate();
        factory(Order::class, 10)->create()->each(function ($order) {
            $order->products()->saveMany(factory(Product::class, 5)->make());
        });
    }
}
