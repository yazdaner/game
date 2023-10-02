<?php

namespace Yazdan\Game\App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Game\App\Http\Requests\GroupRequest;
use Yazdan\Game\App\Models\Group;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\Game\Repositories\GroupRepository;

class GroupController extends Controller
{

    public function store(GroupRequest $request, $gameId)
    {
        $this->authorize('manage', Group::class);
        $game = GameRepository::findById($gameId);
        GroupRepository::store($request, $game->id);
        newFeedbacks();
        return back();
    }

    public function edit($id)
    {
        $this->authorize('manage', Group::class);
        $group = GroupRepository::findById($id);
        return view('Group::admin.edit', compact('group'));
    }

    public function update(GroupRequest $request, $id)
    {
        $this->authorize('manage', Group::class);
        $group = GroupRepository::findById($id);
        $this->authorize('edit', $group);

        GroupRepository::update($request, $id);
        newFeedbacks();
        return redirect()->route('admin.games.details', $group->game->id);
    }

    public function destroy($id)
    {
        $this->authorize('manage', Group::class);
        $game = GroupRepository::findById($id);
        $game->delete();
        return AjaxResponses::SuccessResponses();
    }

    // front method
    public function subscribe($groupId)
    {
        $group = GroupRepository::findById($groupId);

        if($group->game->deadline < now()){
            newFeedbacks('نا موفق','تاریخ بازی به پابان رسیده است','error');
            return back();
        }

        if(auth()->user()->groups->count() > 0){
            foreach(auth()->user()->groups as $item){
                if($group->game_id == $item->game_id){
                   newFeedbacks('نا موفق','شما قبلا در یک گروه از این بازی عضو شده اید','error');
                   return back();
                }
            }
        }

        if($group->capacity == $group->users->count() ){
            newFeedbacks('نا موفق','ظرفیت گروه پر شده است','error');
            return back();
        }

        $group->users()->attach(auth()->id());
        newFeedbacks('با موفقعیت','در گروه عضو شدین','success');
        return back();

    }

}
