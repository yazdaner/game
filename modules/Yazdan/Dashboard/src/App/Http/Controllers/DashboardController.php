<?php

namespace Yazdan\Dashboard\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Payment\App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('index',Payment::class);
        return redirect(route('admin.payments.index'));

    }
}
