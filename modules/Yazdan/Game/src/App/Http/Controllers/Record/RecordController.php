<?php

namespace Yazdan\Game\App\Http\Controllers\Record;

use Illuminate\Http\Request;
use Yazdan\Game\App\Models\Game;
use Yazdan\Game\App\Models\Level;
use Illuminate\Support\Facades\DB;
use Yazdan\Game\App\Models\Record;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isNull;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Game\Repositories\LevelRepository;
use Yazdan\Game\Repositories\RecordRepository;

use Yazdan\Coupon\Repositories\CouponRepository;
use Yazdan\Game\App\Http\Requests\RecordRequest;

class RecordController extends Controller
{
    public function destroy($id)
    {
        $this->authorize('manage', Record::class);
        $record = RecordRepository::findById($id);
        if ($record->media) {
            $record->media->delete();
        }
        $record->delete();
        return AjaxResponses::SuccessResponses();
    }


    public function accepted($id)
    {
        $this->authorize('manage', Record::class);
        if (RecordRepository::UpdateConfirmationStatus($id, RecordRepository::STATUS_ACCEPTED)) {
            return AjaxResponses::SuccessResponses();
        }
        return AjaxResponses::ErrorResponses();
    }

    public function rejected($id)
    {
        $this->authorize('manage', Record::class);
        if (RecordRepository::UpdateConfirmationStatus($id, RecordRepository::STATUS_REJECTED)) {
            return AjaxResponses::SuccessResponses();
        }
        return AjaxResponses::ErrorResponses();
    }

    // Home functions

    public function index($gameId)
    {
        $game = Game::where('id', $gameId)->first();

        if (!auth()->user()->groups()->where('game_id', $gameId)->first()) {
            abort(403);
        }

        $records = $game->records->where('user_id', auth()->id());

        $query = $game->records()->where('user_id', auth()->id())->where('status', RecordRepository::STATUS_ACCEPTED);
        if ($query->first()) {
            $priority = ++$query->orderBy('created_at', 'desc')->first()->level->priority;
        } else {
            $priority = $game->levels->min('priority');
        }

        // Level 1
        $level = $game->levels()->where('priority', $priority)->first();


        if (is_null($level)) {
            $level = false;
        }

        return view('Level::home.index', compact('level', 'records'));
    }

    public function sendRecord(RecordRequest $request)
    {
        if (auth()->user()->records()->where('level_id', $request->level)->where('status', RecordRepository::STATUS_PENDING)->first()) {
            newFeedbacks('نا موفق', 'شما رکوردی در این مرحله از قبل ارسال کرده اید که هنور تایید یا رد نشده است', 'error');
            return back();
        }

        if (isset($request->media)) {
            $images = MediaFileService::publicUpload($request->media);
            $request->request->add(['media_id' => $images->id]);
        }

        // todo validate min record with coupon
        $minScore = LevelRepository::findById($request->level)->minScore;


        // check asset user coupon
        if (isset($request->coupon)) {

            $user = auth()->user();
            $coupon = CouponRepository::findById($request->coupon);
            $userCoupon = $user->coupons->find($request->coupon);


            if (is_null($userCoupon)) {
                newFeedbacks('ناموفق', 'شما کوپن مورد نظر را ندارید', 'error');
                return back();
            }

            $record = $request->claimRecord * $coupon->coefficient;
            if ($record < $minScore) {
                newFeedbacks('ناموفق', 'مجموع امتیاز شما کافی نمیباشد', 'error');
                return back();
            }

            $currntUserCoupon = $userCoupon->pivot->count -= 1;
            $user->coupons()->updateExistingPivot($coupon->id, ['count' => $currntUserCoupon], false);
            if ($userCoupon->pivot->count == 0) {
                DB::table('coupon_user')->where('coupon_id', $coupon->id)->where('user_id', $user->id)->delete();
            }
        } else {
            $record = $request->claimRecord;
        }
        if ($record < $minScore) {
            newFeedbacks('ناموفق', 'مجموع امتیاز شما کافی نمیباشد', 'error');
            return back();
        }

        //todo
        Record::create([
            'claimRecord' => $record,
            'media_id' => $request->media_id,
            'level_id' => $request->level,
            'user_id' => auth()->id(),
            'status' => RecordRepository::STATUS_PENDING,
            'coupon_id' => $request->coupon ?? null,
        ]);

        newFeedbacks();
        return back();
    }

    public function coinRecord(Level $level)
    {
        // todo
        if ($level->coin > auth()->user()->coin) {
            newFeedbacks('نا موفق', 'تعداد یکه های شما کافی نمیباشد', 'error');
            return back();
        }

        Record::create([
            'level_id' => $level->id,
            'user_id' => auth()->id(),
            'coin' => $level->coin,
            'status' => RecordRepository::STATUS_ACCEPTED,
        ]);

        auth()->user()->coin -= $level->coin;
        auth()->user()->save();

        newFeedbacks();
        return back();
    }
}
