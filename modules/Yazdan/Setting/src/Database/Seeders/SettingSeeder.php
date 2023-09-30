<?php

namespace Yazdan\Setting\Database\Seeders;

use Illuminate\Database\Seeder;

use Yazdan\Setting\App\Models\Setting;
use Yazdan\Setting\Repositories\SettingRepository;

class SettingSeeder extends Seeder
{

    public function run()
    {
        Setting::firstOrCreate(['telephone' => SettingRepository::$defaultSetting['telephone']],
        [
            'telephone' => SettingRepository::$defaultSetting['telephone'],
            'email' => SettingRepository::$defaultSetting['email'],
            'address' => SettingRepository::$defaultSetting['address'],
            'description' => SettingRepository::$defaultSetting['description'],
            'copyright' => SettingRepository::$defaultSetting['copyright'],
            'instagram' => SettingRepository::$defaultSetting['instagram'],
            'telegram' => SettingRepository::$defaultSetting['telegram'],
            'facebook' => SettingRepository::$defaultSetting['facebook'],
            'whatsapp' => SettingRepository::$defaultSetting['whatsapp'],
            'youtube' => SettingRepository::$defaultSetting['youtube'],
            'twitter' => SettingRepository::$defaultSetting['twitter'],
            'twitch' => SettingRepository::$defaultSetting['twitch'],
        ]);
    }
}
