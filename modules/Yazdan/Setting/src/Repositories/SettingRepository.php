<?php
namespace Yazdan\Setting\Repositories;

use Yazdan\Setting\App\Models\Setting;

class SettingRepository
{

    public static function findById($id)
    {
        return Setting::find($id);
    }

    static $defaultSetting = [
        'telephone' => 'telephone',
        'email' => 'email',
        'address' => 'address',
        'description' => 'description',
        'copyright' => 'copyright',
        'instagram' => 'instagram',
        'telegram' => 'telegram',
        'facebook' => 'facebook',
        'whatsapp' => 'whatsapp',
        'youtube' => 'youtube',
        'twitter' => 'twitter',
        'twitch' => 'twitch',
    ];

    public static function update($id, $data)
    {
        $setting = static::findById($id);

        $setting->update([
            'telephone' => $data['telephone'] ?? '' ,
            'email' => $data['email'] ?? '' ,
            'address' => $data['address'] ?? '' ,
            'description' => $data['description'] ?? '' ,
            'copyright' => $data['copyright'] ?? '' ,
            'instagram' => $data['instagram'] ?? '' ,
            'telegram' => $data['telegram'] ?? '' ,
            'facebook' => $data['facebook'] ?? '' ,
            'whatsapp' => $data['whatsapp'] ?? '' ,
            'youtube' => $data['youtube'] ?? '' ,
            'twitter' => $data['twitter'] ?? '' ,
            'twitch' => $data['twitch'] ?? '' ,
        ]);
    }
}
