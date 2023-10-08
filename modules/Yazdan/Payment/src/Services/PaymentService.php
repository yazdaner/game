<?php

namespace Yazdan\Payment\Services;

use Yazdan\Payment\Gateways\Gateway;
use Yazdan\Payment\Repositories\PaymentRepository;
use Yazdan\User\App\Models\User;

class PaymentService {

    public static function generate($paymentable,User $user,$amount,$discounts = [])
    {
        if($amount <= 0 || is_null($paymentable) || is_null($user->id) ) return false;
        $gateway = resolve(Gateway::class);
        $title = env('APP_NAME') . ' خرید از سایت';
        $invoice_id = $gateway->request($amount,$title);

        if(is_array($invoice_id)){
            newFeedbacks('ناموفق',$invoice_id['message'],'error');
            return back();
        }
        foreach($paymentable as $item){
            resolve(PaymentRepository::class)->store([
                'user_id' => $user->id,
                'paymentable_id' => $item['model']->id,
                'paymentable_type' => get_class($item['model']),
                'amount' => round($item['amount']),
                'quantity' => $item['quantity'],
                'totalAmount' => $item['totalAmount'],
                'invoice_id' => $invoice_id,
                'gateway' => $gateway->getName(),
                'status' => PaymentRepository::CONFIRMATION_STATUS_PENDING,
            ], $item['discounts']);
        }

    }

}
