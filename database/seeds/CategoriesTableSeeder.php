<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'slug'              => 'online-marketing',
            'name'              => 'Online Marketing',
            'description'       => 'hello-world',
            'image_url'         => 'https://placehold.it/300x200',
            'on_homepage'       => '1',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'slug'              => 'social-media',
            'name'              => 'Social Media',
            'description'       => 'hello-world',
            'image_url'         => 'https://placehold.it/300x200',
            'on_homepage'       => '1',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'slug'              => 'entwicklung',
            'name'              => 'Entwicklung',
            'description'       => 'hello-world',
            'image_url'         => 'https://placehold.it/300x200',
            'on_homepage'       => '1',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'slug'              => 'tutorials',
            'name'              => 'Tutorials',
            'description'       => 'hello-world',
            'image_url'         => 'https://placehold.it/300x200',
            'on_homepage'       => '0',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'slug'              => 'cms',
            'name'              => 'Content Management Systeme',
            'description'       => 'hello-world',
            'image_url'         => 'https://placehold.it/300x200',
            'on_homepage'       => '0',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'slug'              => 'frameworks',
            'name'              => 'Frameworks',
            'description'       => 'hello-world',
            'image_url'         => 'https://placehold.it/300x200',
            'on_homepage'       => '0',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'slug'              => 'tools',
            'name'              => 'Tools',
            'description'       => 'hello-world',
            'image_url'         => 'https://placehold.it/300x200',
            'on_homepage'       => '0',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
    }
}
