<?php

namespace Yazdan\Game\Repositories;

use Yazdan\Game\App\Models\Game;
use Yazdan\Game\App\Models\Record;

class RecordRepository
{

    const STATUS_ACCEPTED = 'accepted';
    const STATUS_PENDING = 'pending';
    const STATUS_REJECTED = 'rejected';

    static $statuses = [
        self::STATUS_ACCEPTED,
        self::STATUS_PENDING,
        self::STATUS_REJECTED,
    ];

    public static function findById($id)
    {
        return Record::find($id);
    }

    public static function GameRecordsPaginate($gameId)
    {
        return Game::where('id',$gameId)->with('records')->first();
    }

    public static function updateConfirmationStatus($id,string $status)
    {
        $record = static::findById($id);

        return $record->update([
            'status' => $status
        ]);
    }
}
