<?php

namespace Yazdan\Game\App\Http\Controllers\Record;

use Yazdan\Game\App\Models\Game;
use Yazdan\Game\App\Models\Level;
use Yazdan\Game\App\Models\Record;
use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Game\Repositories\RecordRepository;
use Yazdan\Game\App\Http\Requests\RecordRequest;

class RecordController extends Controller
{
    public function destroy($id)
    {

        $record = RecordRepository::findById($id);

        if ($record->media) {
            $record->media->delete();
        }

        $record->delete();
        return AjaxResponses::SuccessResponses();
    }


    public function accepted($id)
    {

        if (RecordRepository::UpdateConfirmationStatus($id, RecordRepository::STATUS_ACCEPTED)) {
            return AjaxResponses::SuccessResponses();
        }
        return AjaxResponses::ErrorResponses();
    }

    public function rejected($id)
    {

        if (RecordRepository::UpdateConfirmationStatus($id, RecordRepository::STATUS_REJECTED)) {
            return AjaxResponses::SuccessResponses();
        }
        return AjaxResponses::ErrorResponses();
    }



    public function index($gameId)
    {
        // todo
        $game = Game::where('id',$gameId)->first();

        $records = $game->records->where('user_id',auth()->id());



        $query = $game->records()->where('user_id',auth()->id())->where('status',RecordRepository::STATUS_ACCEPTED);
        if($query->first()){
            $priority = ++ $query->orderBy('created_at', 'desc')->first()->level->priority;
        }else{
            $priority = $game->levels->min('priority');
        }

        // Level 1
        $level = $game->levels()->where('priority', $priority)->first();


        if(is_null($level)){
            $level = false;
        }

        return view('Level::home.index',compact('level','records'));
    }

    public function sendRecord(RecordRequest $request)
    {

        if(auth()->user()->records()->where('level_id',$request->level)->where('status',RecordRepository::STATUS_PENDING)->first()){
            newFeedbacks('نا موفق','شما رکوردی در این مرحله از قبل ارسال کرده اید که هنور تایید یا رد نشده است','error');
            return back();
        }

        if (isset($request->media)) {
            $images = MediaFileService::publicUpload($request->media);
            $request->request->add(['media_id' => $images->id]);
        }

        //todo
        Record::create([
            'claimRecord' => $request->claimRecord,
            'media_id' => $request->media_id,
            'status' => $request->status,
            'level_id' => $request->level,
            'user_id' => auth()->id(),
            'status' => RecordRepository::STATUS_PENDING,
        ]);

        newFeedbacks();
        return back();
    }
}
