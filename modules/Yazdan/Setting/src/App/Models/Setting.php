<?php

namespace Yazdan\Setting\App\Models;

use Yazdan\Media\App\Models\Media;
use Yazdan\Payment\App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Payment\Traits\PaymentTrait;

class Setting extends Model
{
    use PaymentTrait;

    protected $table = 'settings';

    protected $guarded = [];

}
