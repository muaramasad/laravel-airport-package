<?php

namespace Muaramasad\Airport\Seeds;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AirportSeeder::class);
    }
}
