<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jason',
            'email' => 'jason@htaccess24.de',
            'password' => bcrypt('at45DxaPJa'),
            'api_token' => 'CIrHb9Vr1OOibuKcm9ppvxEviy9g3tKOxgDL6Ni5fkr72GjneExctSIjlFsX'
        ]);
    }
}
