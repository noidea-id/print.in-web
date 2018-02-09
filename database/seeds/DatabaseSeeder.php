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

        factory(App\Category::class, 1)->create(['name' => 'Banner'])->each(function ($category) {
            $category->products()->save(factory(App\Product::class)->make(['name' => 'X-Banner Flexy Korea']));
            $category->products()->save(factory(App\Product::class)->make(['name' => 'X-Banner Flexy China']));
        });
        factory(App\Category::class, 1)->create(['name' => 'X-Banner'])->each(function ($category) {
            $category->products()->save(factory(App\Product::class)->make(['name' => 'Rollup Banner Flexy China']));
            $category->products()->save(factory(App\Product::class)->make(['name' => 'Rollup Banner Flexy Korea']));
            $category->products()->save(factory(App\Product::class)->make(['name' => 'Rollup Banner Luster']));
        });
        factory(App\Category::class, 1)->create(['name' => 'Rollup Banner'])->each(function ($category) {
            $category->products()->save(factory(App\Product::class)->make(['name' => 'Banner Luster']));
        });
    }
}
