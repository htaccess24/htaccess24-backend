<?php

use Carbon\Carbon;
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
                'slug'              => 'hello-world'. $i,
                'name'              => 'hello-world'. $i,
                'short_description' => 'hello-world'. $i,
                'content'           => 'hello-world'. $i,
                'image_url'         => 'https://placehold.it/300x200',
                'reading_time'      => $i,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);
        }
    }
}
