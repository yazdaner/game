<?php

namespace Yazdan\Coin\App\Http\Controllers\Home;

use Yazdan\Coin\App\Models\Coin;
use App\Http\Controllers\Controller;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Coin\Repositories\CoinRepository;
use Yazdan\Coin\App\Http\Requests\CoinRequest;

class HomeCoinController extends Controller
{
    public function index()
    {
        $coin = Coin::first();
        return view('Coin::home.index',compact('coin'));
    }
}
