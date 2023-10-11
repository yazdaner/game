<?php

namespace Yazdan\LiderBoard\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\LiderBoard\App\Http\Requests\LiderBoardRequest;
use Yazdan\LiderBoard\App\Models\LiderBoard;
use Yazdan\LiderBoard\Repositories\LiderBoardRepository;
use Yazdan\Common\Responses\AjaxResponses;

class LiderBoardController extends Controller
{

    public function index()
    {
        $this->authorize('manage', LiderBoard::class);
        $liderBoards = LiderBoardRepository::getAllPaginate(10);
        return view('LiderBoard::index', compact('liderBoards'));
    }


    public function store(LiderBoardRequest $request)
    {
        $this->authorize('manage', LiderBoard::class);
        LiderBoardRepository::create($request);
        newFeedbacks();
        return back();
    }

    public function edit($liderBoard)
    {
        $this->authorize('manage', LiderBoard::class);
        $liderBoard = LiderBoardRepository::findById($liderBoard);
        return view('LiderBoard::edit', compact('liderBoard'));
    }

    public function update($LiderBoardId, LiderBoardRequest $request)
    {
        $this->authorize('manage', LiderBoard::class);
        LiderBoardRepository::updating($LiderBoardId, $request);
        newFeedbacks();
        return redirect(route('admin.liderBoards.index'));
    }

    public function destroy($LiderBoardId)
    {
        $this->authorize('manage', LiderBoard::class);
        LiderBoardRepository::delete($LiderBoardId);
        return AjaxResponses::SuccessResponses();
    }
}
