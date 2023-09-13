<?php

namespace Yazdan\Coin\Database\Seeders;

use Illuminate\Database\Seeder;

use Yazdan\Coin\App\Models\Coin;
use Yazdan\Coin\Repositories\CoinRepository;

class CoinSeeder extends Seeder
{

    public function run()
    {
        Coin::firstOrCreate(['name' => CoinRepository::$defaultCoin['name']],
        [
            'name' => CoinRepository::$defaultCoin['name'],
            'price' => CoinRepository::$defaultCoin['price'],
        ]);
    }
}
