<?php

namespace Yazdan\Game\App\Http\Controllers\Level;

use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Game\App\Http\Requests\LevelRequest;
use Yazdan\Game\App\Models\Level;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\Game\Repositories\LevelRepository;

class LevelController extends Controller
{

    public function create($gameId)
    {
        $this->authorize('manage', Level::class);
        $coupons = Coupon::all();
        $game = GameRepository::findById($gameId);
        return view('Level::admin.create', compact('game','coupons'));
    }
    
    public function store(LevelRequest $request, $gameId)
    {
        $this->authorize('manage', Level::class);
        $game = GameRepository::findById($gameId);
        LevelRepository::store($request, $game->id);
        newFeedbacks();
        return redirect()->route('admin.games.details', $gameId);
    }

    public function destroy($id)
    {
        $this->authorize('manage', Level::class);
        $level = LevelRepository::findById($id);
        $level->delete();
        return AjaxResponses::SuccessResponses();
    }

    public function edit($id)
    {
        $this->authorize('manage', Level::class);
        $coupons = Coupon::all();
        $level = LevelRepository::findById($id);
        return view('Level::admin.edit', compact('level','coupons'));
    }

    public function update($id, LevelRequest $request)
    {
        $this->authorize('manage', Level::class);
        $level = LevelRepository::findById($id);
        LevelRepository::update($request, $id);
        newFeedbacks();
        return redirect()->route('admin.games.details', $level->game->id);
    }
}
