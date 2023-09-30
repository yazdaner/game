<?php

namespace Yazdan\About\App\Models;

use Yazdan\Media\App\Models\Media;
use Yazdan\Payment\App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Payment\Traits\PaymentTrait;

class About extends Model
{
    protected $table = 'abouts';
    protected $guarded = [];

}
