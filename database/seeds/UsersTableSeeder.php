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
            'username' => 'Atlas一郎',
            'mail' => 'a@com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'username' => 'Atlas二郎',
            'mail' => 'b@com',
            'password' => Hash::make('234567'),
        ]);

        DB::table('users')->insert([
            'username' => 'Atlas三郎',
            'mail' => 'c@com',
            'password' => Hash::make('345678'),
        ]);

        DB::table('users')->insert([
            'username' => 'Atlas四郎',
            'mail' => 'd@com',
            'password' => Hash::make('456789'),
        ]);

        DB::table('users')->insert(
            [
                'username' => 'Atlas五郎',
                'mail' => 'e@com',
                'password' => Hash::make('567891'),
            ]
        );
    }
}
