<?php

namespace Yazdan\Regulation\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yazdan\Regulation\App\Models\Regulation;
use Yazdan\Regulation\Repositories\RegulationRepository;

class RegulationController extends Controller
{
    public function edit()
    {
        $this->authorize('manage', Regulation::class);
        $regulation = Regulation::first();
        if (is_null($regulation)) {
            abort('403');
        }
        return view('Regulation::admin.edit', compact('regulation'));
    }

    public function update(Regulation $regulation, Request $request)
    {
        $this->authorize('manage', Regulation::class);

        RegulationRepository::update($regulation->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.regulation.edit");
    }


    // front
    public function regulation()
    {
        $regulation = Regulation::first();
        return view("Regulation::front.index",compact('regulation'));
    }
}
