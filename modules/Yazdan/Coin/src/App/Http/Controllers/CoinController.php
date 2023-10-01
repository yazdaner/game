<?php

namespace Yazdan\Coin\App\Http\Controllers;

use Yazdan\Coin\App\Models\Coin;
use App\Http\Controllers\Controller;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Coin\Repositories\CoinRepository;
use Yazdan\Coin\App\Http\Requests\CoinRequest;

class CoinController extends Controller
{
    public function edit()
    {
        $this->authorize('manage', Coin::class);
        $coin = Coin::first();
        if (is_null($coin)) {
            abort('403');
        }
        return view('Coin::admin.edit', compact('coin'));
    }

    public function update(Coin $coin, CoinRequest $request)
    {
        $this->authorize('manage', Coin::class);

        if ($request->hasFile('media')) {

            if ($coin->media) {
                $coin->media->delete();
            }
              $images = MediaFileService::publicUpload($request->media);if($images == false){
            newFeedbacks('نا موفق','فرمت فایل نامعتبر میباشد','error');
            return back();
        }
            $request->request->add(['media_id' => $images->id]);
        } else {
            if ($coin->media && $coin->media->id) {
                $request->request->add(['media_id' => $coin->media->id]);
            }
        }
        CoinRepository::update($coin->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.coin.edit");
    }
}
