<?php

namespace Yazdan\Setting\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yazdan\Setting\App\Http\Requests\SettingRequest;
use Yazdan\Setting\App\Models\Setting;
use Yazdan\Setting\Repositories\SettingRepository;

class SettingController extends Controller
{
    public function edit()
    {
        $this->authorize('manage', Setting::class);
        $setting = Setting::first();
        if (is_null($setting)) {
            abort('403');
        }
        return view('Setting::admin.edit', compact('setting'));
    }

    public function update(Setting $setting, Request $request)
    {
        $this->authorize('manage', Setting::class);

        SettingRepository::update($setting->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.setting.edit");
    }
}
