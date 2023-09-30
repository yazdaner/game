<?php
namespace Yazdan\About\Repositories;

use Yazdan\About\App\Models\About;

class AboutRepository
{

    public static function findById($id)
    {
        return About::find($id);
    }

    static $defaultAbout = [
        'body' => 'about us',
    ];

    public static function update($id, $data)
    {
        $setting = static::findById($id);

        $setting->update([
            'body' => $data['body'] ?? '' ,
        ]);
    }
}
