<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $inserts = array();
        for ($i = 0; $i != 10; $i++) {
            array_push($inserts, array(
                'title' => $faker->text(),
                'body' => $faker->text(),
                'author' => 'blek!',
                'time' => (rand() % (time() - 1664546400)) + 1664546400,
                'hidden' => false
            ));
        }

        DB::table('blog')->insert($inserts);
    }
}
