<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        factory(App\Merchant::class, 5)->create();

        factory(App\Category::class, 1)->create(['name' => 'Banner'])->each(function ($category) {
            $category->products()->save(factory(App\Product::class)->make([
                'name' => 'X-Banner Flexy Korea',
                'merchant_id' => App\Merchant::inRandomOrder()->first()->id,
            ]));
            $category->products()->save(factory(App\Product::class)->make([
                'name' => 'X-Banner Flexy China',
                'merchant_id' => App\Merchant::inRandomOrder()->first()->id,
            ]));
        });
        factory(App\Category::class, 1)->create(['name' => 'X-Banner'])->each(function ($category) {
            $category->products()->save(factory(App\Product::class)->make([
                'name' => 'Rollup Banner Flexy China',
                'merchant_id' => App\Merchant::inRandomOrder()->first()->id,
            ]));
            $category->products()->save(factory(App\Product::class)->make([
                'name' => 'Rollup Banner Flexy Korea',
                'merchant_id' => App\Merchant::inRandomOrder()->first()->id,
            ]));
            $category->products()->save(factory(App\Product::class)->make([
                'name' => 'Rollup Banner Luster',
                'merchant_id' => App\Merchant::inRandomOrder()->first()->id,
            ]));
        });
        factory(App\Category::class, 1)->create(['name' => 'Rollup Banner'])->each(function ($category) {
            $category->products()->save(factory(App\Product::class)->make([
                'name' => 'Banner Luster',
                'merchant_id' => App\Merchant::inRandomOrder()->first()->id,
            ]));
        });
    }
}
