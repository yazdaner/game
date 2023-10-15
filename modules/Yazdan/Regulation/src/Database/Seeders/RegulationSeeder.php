<?php

namespace Yazdan\Regulation\Database\Seeders;

use Illuminate\Database\Seeder;
use Yazdan\Regulation\App\Models\Regulation;
use Yazdan\Regulation\Repositories\RegulationRepository;

class RegulationSeeder extends Seeder
{

    public function run()
    {
        Regulation::firstOrCreate(['body' => RegulationRepository::$defaultRegulation['body']],
        [
            'body' => RegulationRepository::$defaultRegulation['body'],
        ]);
    }
}
