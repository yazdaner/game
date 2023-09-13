<?php
namespace Yazdan\Coin\Repositories;

use Yazdan\Coin\App\Models\Coin;

class CoinRepository
{
    public static function findById($id)
    {
        return Coin::find($id);
    }

    static $defaultCoin = [
        'name' => 'coin',
        'price' => '10000'
    ];

    public static function update($id, $data)
    {
        $coin = static::findById($id);

        return $coin->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'media_id' => $data['media_id'],
        ]);
    }
}
