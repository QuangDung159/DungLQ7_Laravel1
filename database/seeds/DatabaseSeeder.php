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
        $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
    public function run()
    {
        DB::table("users")->insert(
            [
                "name" => "Dũng",
                "email" => str_random(3) . "@fsoft.com.vn",
                "password" => bcrypt("123")
            ],
            [
                "name" => "Dũng",
                "email" => str_random(3) . "@fsoft.com.vn",
                "password" => bcrypt("123")
            ],
            [
                "name" => "Dũng",
                "email" => str_random(3) . "@fsoft.com.vn",
                "password" => bcrypt("123")
            ]
        );
    }
}
