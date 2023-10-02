<?php

namespace Yazdan\Coin\App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Yazdan\Coin\App\Models\Coin;

class HomeCoinController extends Controller
{
    public function index()
    {
        $coin = Coin::first();
        return view('Coin::home.index',compact('coin'));
    }
}
