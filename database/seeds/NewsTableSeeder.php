<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            DB::table('news')->insert([
                'slug'              => str_random(10),
                'name'              => str_random(10),
                'short_description' => str_random(100),
                'content'           => str_random(300),
                'image_url'         => 'https://placehold.it/300x200',
            ]);
        }
    }
}
