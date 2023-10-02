<?php

namespace Yazdan\Game\App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Game\App\Http\Requests\GameRequest;
use Yazdan\Game\App\Models\Game;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\Game\Repositories\LevelRepository;
use Yazdan\Game\Repositories\RecordRepository;
use Yazdan\Media\Services\MediaFileService;

class GameController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Game::class);
        $games = Game::latest()->paginate(10);
        return view('Game::admin.index', compact('games'));
    }

    public function create()
    {
        $this->authorize('manage', Game::class);
        return view('Game::admin.create');
    }

    public function store(GameRequest $request)
    {
        $this->authorize('manage', Game::class);
        if (isset($request->media)) {
            $images = MediaFileService::publicUpload($request->media);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            $request->request->add(['media_id' => $images->id]);
        }
        GameRepository::store($request);

        newFeedbacks();
        return redirect(route('admin.games.index'));
    }

    public function destroy($id)
    {
        $this->authorize('manage', Game::class);
        $game = GameRepository::findById($id);
        if ($game->media) {
            $game->media->delete();
        }
        $game->delete();
        return AjaxResponses::SuccessResponses();
    }

    public function edit($id)
    {
        $this->authorize('manage', Game::class);
        $statuses = GameRepository::$statuses;
        $game = GameRepository::findById($id);
        return view('Game::admin.edit', compact('game','statuses'));
    }

    public function update($id, GameRequest $request)
    {
        $this->authorize('manage', Game::class);
        $game = GameRepository::findById($id);

        if ($request->hasFile('media')) {
            $images = MediaFileService::publicUpload($request->media);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            if ($game->media) {
                $game->media->delete();
            }
            $request->request->add(['media_id' => $images->id]);
        } else {
            if ($game->media && $game->media->id) {
                $request->request->add(['media_id' => $game->media->id]);
            }
        }
        GameRepository::update($id, $request);
        newFeedbacks();
        return redirect(route('admin.games.index'));
    }

    public function details($gameId)
    {
        $this->authorize('manage', Game::class);
        $game = GameRepository::findById($gameId);
        $levels = LevelRepository::GameLevelPaginate($gameId, 15);
        return view('Game::admin.details', compact('game', 'levels'));
    }


    public function records($gameId)
    {
        $this->authorize('manage', Game::class);
        $game = RecordRepository::GameRecordsPaginate($gameId);
        $records = $game->records()->latest()->paginate(20);
        return view('Game::admin.records', compact('game', 'records'));
    }
}
