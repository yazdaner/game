<?php

namespace Yazdan\Discount\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Coin\App\Models\Coin;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Discount\App\Http\Requests\CodeRequest;
use Yazdan\Discount\App\Http\Requests\DiscountRequest;
use Yazdan\Discount\App\Models\Discount;
use Yazdan\Discount\Repositories\DiscountRepository;
use Yazdan\Discount\Services\DiscountService;

class DiscountController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Discount::class);
        $discounts = DiscountRepository::paginateAll();
        $coupons = Coupon::all();
        $coin = Coin::first();
        return view('Discount::admin.index', compact('coupons', 'discounts','coin'));
    }

    public function store(DiscountRequest $request)
    {
        $this->authorize('manage', Discount::class);

        DiscountRepository::store($request->all());

        newFeedbacks();

        return back();
    }

    public function edit(Discount $discount)
    {
        $this->authorize('manage', Discount::class);
        $coupons = Coupon::all();
        $coin = Coin::first();
        return view("Discount::admin.edit", compact("discount", "coupons","coin"));
    }

    public function update(Discount $discount, DiscountRequest $request)
    {
        $this->authorize('manage', Discount::class);
        DiscountRepository::update($discount->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.discounts.index");
    }

    public function destroy(Discount $discount)
    {
        $this->authorize('manage', Discount::class);

        $discount->delete();
        return AjaxResponses::SuccessResponses();
    }

    public function check(CodeRequest $request)
    {
        $ProductWithDiscount = [];
        foreach (\Cart::getContent() as $item) {
            $discount = DiscountRepository::getValidDiscountByCode($request->code, $item->associatedModel);
            if (!is_null($discount)) {
                $ProductWithDiscount[] = [
                    'product' => $item->associatedModel,
                    'discount' => $discount,
                    'quantity' => $item->quantity,
                ];
            }
        }

        if ($ProductWithDiscount == []) {
            newFeedbacks('ناموفق', 'کد تخفیف وارد شده نامعتبر می باشد', 'error');
            return back();
        }
        if (session()->has('code')) {
            session()->forget('code');
        }
        session()->put('code', $request->code);

        foreach ($ProductWithDiscount as $item) {
            $discountAmount = DiscountService::calculateDiscountAmount($item['product'], $item['discount'],$item['quantity']);
            \Cart::update(get_class($item['product']) . '-' .  $item['product']->id,
                ['price' => $discountAmount / $item['quantity']]);
        }

        newFeedbacks();
        return back();
    }
}
