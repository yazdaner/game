<?php

namespace Yazdan\Game\App\Http\Controllers\Game;

use Yazdan\Game\App\Models\Game;
use App\Http\Controllers\Controller;
use Yazdan\Game\Repositories\GameRepository;

class HomeGameController extends Controller
{
    public function index()
    {
        $groups = auth()->user()->groups()->with('game')->get();
        $games = [];
        foreach($groups as $game){
            $games[] = $game->game;
        }
        return view('Game::home.index',compact('games'));
    }

    public function games()
    {
        $games = GameRepository::getAll();
        return view('Game::home.games',compact('games'));
    }
    public function show(Game $game)
    {
        return view('Game::home.show',compact('game'));
    }
}
