<?php

namespace Yazdan\About\Database\Seeders;

use Illuminate\Database\Seeder;

use Yazdan\About\App\Models\About;
use Yazdan\About\Repositories\AboutRepository;

class AboutSeeder extends Seeder
{

    public function run()
    {
        About::firstOrCreate(['body' => AboutRepository::$defaultAbout['body']],
        [
            'body' => AboutRepository::$defaultAbout['body'],
        ]);
    }
}
