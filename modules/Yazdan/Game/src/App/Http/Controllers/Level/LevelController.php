<?php

namespace Yazdan\Game\App\Http\Controllers\Level;

use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\Game\Repositories\LevelRepository;
use Yazdan\Game\App\Http\Requests\LevelRequest;

class LevelController extends Controller
{

    public function create($gameId)
    {
        $coupons = Coupon::all();
        $game = GameRepository::findById($gameId);
        return view('Level::admin.create', compact('game','coupons'));
    }
    public function store(LevelRequest $request, $gameId)
    {
        $game = GameRepository::findById($gameId);
        LevelRepository::store($request, $game->id);

        newFeedbacks();
        return redirect()->route('admin.games.details', $gameId);
    }


    public function destroy($id)
    {
        $level = LevelRepository::findById($id);

        $level->delete();
        return AjaxResponses::SuccessResponses();
    }


    public function edit($id)
    {
        $coupons = Coupon::all();
        $level = LevelRepository::findById($id);

        return view('Level::admin.edit', compact('level','coupons'));
    }

    public function update($id, LevelRequest $request)
    {
        $level = LevelRepository::findById($id);


        LevelRepository::update($request, $id);

        newFeedbacks();
        return redirect()->route('admin.games.details', $level->game->id);
    }
}
