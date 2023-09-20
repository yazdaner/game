<?php

namespace Yazdan\Payment\Traits;

use Yazdan\Discount\App\Models\Discount;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Discount\Repositories\DiscountRepository;

trait PaymentTrait
{
    public function getDiscount()
    {
        $discountRepo = new DiscountRepository();
        $discount = $discountRepo->getBiggerDiscount($this->id);
        $globalDiscount = $discountRepo->getGlobalBiggerDiscount();
        if ($discount == null && $globalDiscount == null) return null;
        if ($discount == null && $globalDiscount != null) return $globalDiscount;
        if ($discount != null && $globalDiscount == null) return $discount;
        if ($globalDiscount->percent > $discount->percent) return $globalDiscount;
        return $discount;
    }

    public function getDiscountWithCode()
    {
        if (session()->has('code')) {
            $discountId = DiscountRepository::findByCode(session()->get('code'))->id;
            if ($discountId && $this->discounts) {
                foreach ($this->discounts as $discount) {
                    if ($discount->id == $discountId) {
                        return $discount;
                    }
                }
            }
        }else{
            return 0;
        }
    }

    public function getDiscountPercent()
    {
        $discount = $this->getDiscount();
        $getDiscountWithCode = $this->getDiscountWithCode();

        if ($discount == null && $getDiscountWithCode == null) return 0;
        if ($discount != null && $getDiscountWithCode == null) return $discount->percent;
        if ($discount != null && $getDiscountWithCode != null) return
        $discount->percent + $getDiscountWithCode->percent >= 100 ? 100 : $discount->percent + $getDiscountWithCode->percent ;

    }

    public function hasDiscount()
    {
        $discount = $this->getDiscountPercent();
        return $discount == 0 ? false : true;
    }

    public function getDiscountAmount($percent = null)
    {
        if ($percent == null) {
            $percent = $this->getDiscountPercent();
        }
        return DiscountService::calculateDiscountAmount($this->price, $percent);
    }


    public function finalPrice($quantity = 1, $code = null, $withDiscounts = false)
    {
        $discounts = [];
        $discount = $this->getDiscount();
        $amount = $this->price;

        if ($discount) {
            $discounts[] = $discount;
            $amount = $this->price - $this->getDiscountAmount($discount->percent);
        }

        if ($code) {
            $repo = new DiscountRepository();
            $discountFromCode = $repo->getValidDiscountByCode($code, $this->id);

            if ($discountFromCode) {
                $discounts[] = $discountFromCode;

                $amount = $amount - DiscountService::calculateDiscountAmount($amount, $discountFromCode->percent);
            }
        }

        $amount = $amount * $quantity;

        if ($withDiscounts)
            return [$amount, $discounts];
        return $amount;
    }
}
