<?php

namespace Yazdan\Payment\Traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Yazdan\Discount\App\Models\Discount;
use Yazdan\Discount\Repositories\DiscountRepository;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Payment\App\Models\Payment;

trait PaymentTrait
{
    use HasRelationships;

    // relation discounts
    public function discounts()
    {
        return $this->morphToMany(Discount::class, "discountable");
    }
    // relation payments
    public function payments()
    {
        return $this->morphMany(Payment::class, "paymentable");
    }
    // dicount functions

    public function getDiscountWithCode()
    {
        if (session()->has('code') == null || !$this->discounts) return null;

        $discount = DiscountRepository::findByCode(session()->get('code'));
        if (!$discount) return null;

        // return discount type all
        if ($discount->type == 'all') return $discount;

        // return special discount of this product who has code
        foreach ($this->discounts as $item) {
            if ($item->id == $discount->id) {
                return $item;
            }
        }
    }

    public function getDiscountPercent()
    {
        $getDiscountWithCode = $this->getDiscountWithCode() ? $this->getDiscountWithCode()->percent : null;
        if ($getDiscountWithCode == null) return 0;
        if ($getDiscountWithCode != null) return $getDiscountWithCode;
    }

    public function hasDiscount()
    {
        $discount = $this->getDiscountPercent();
        return $discount == 0 ? false : true;
    }

    public function getDiscountAmount($discount)
    {
        return DiscountService::calculateDiscountAmount($this, $discount);
    }

    // get final price with dicounts
    public function finalPrice($quantity = 1, $code = null, $withDiscounts = false)
    {
        $discounts = [];
        if ($code) {
            $repo = new DiscountRepository();
            $discountFromCode = $repo->getValidDiscountByCode($code, $this);

            if ($discountFromCode) {
                $discounts[] = $discountFromCode;

                $amount = DiscountService::calculateDiscountAmount($this, $discountFromCode,$quantity);
            }
        }
        if ($withDiscounts)
            return [$amount, $discounts];
        return $amount;
    }

}
