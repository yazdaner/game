<?php
namespace Yazdan\Regulation\Repositories;

use Yazdan\Regulation\App\Models\Regulation;

class RegulationRepository
{

    public static function findById($id)
    {
        return Regulation::find($id);
    }

    static $defaultRegulation = [
        'body' => 'regulation',
    ];

    public static function update($id, $data)
    {
        $setting = static::findById($id);

        $setting->update([
            'body' => $data['body'] ?? '' ,
        ]);
    }
}
