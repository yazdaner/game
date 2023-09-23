<?php

namespace Yazdan\Cart\App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Yazdan\Coin\App\Models\Coin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yazdan\Payment\Gateways\Gateway;
use Illuminate\Support\Facades\Session;
use Yazdan\Payment\Services\PaymentService;
use Yazdan\Cart\App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function index()
    {
        return view('Cart::index');
    }

    public function add(CartRequest $request)
    {
        $count = is_null($request->count) ? 1 : $request->count;

        $productModel =  \Crypt::decrypt($request->productable_type);
        $productId = $request->productable_id;

        $product = $productModel::find($productId);

        $rowId = $productModel . '-' .  $productId;

        if (\Cart::get($rowId) == null) {
            \Cart::add(array(
                'id' => $rowId,
                'name' => $product->title,
                'price' => $product->finalPrice(),
                'quantity' => $count,
                'attributes' => $product->toArray(),
                'associatedModel' => $product
            ));
        } else {
            newFeedbacks('دقت کنید', 'محصول مورد نظر به سبد خرید شما اضافه شده است', 'error');
            return redirect(route('users.cart.index'));
        }

        newFeedbacks();
        return redirect(route('users.cart.index'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'qtybutton' => 'required'
        ]);

        foreach ($request->qtybutton as $rowId => $quantity) {

            Cart::update($rowId, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
                'price' => \Cart::getContent()[$rowId]->associatedModel->finalPrice()
            ));
        }
        session()->forget('code');

        newFeedbacks('با موفقیت', 'سبد خرید شما ویرایش شد', 'success');
        return back();
    }




    public function remove($rowId)
    {
        Cart::remove($rowId);

        newFeedbacks('با موفقیت', 'محصول مورد نظر از سبد خرید شما حذف شد', 'success');
        return back();
    }

    public function clear()
    {
        Cart::clear();
        session()->forget('code');
        newFeedbacks('با موفقیت', 'سبد خرید شما پاک شد', 'success');
        return back();
    }

    public function buy()
    {
        if(\Cart::isEmpty()){
            newFeedbacks('نا موفق','سبد خرید شمل خالی است','error');
            return back();
        }
        $items = [];
        foreach (\Cart::getContent() as $item){
            $model = get_class($item->associatedModel);
            $id = $item->associatedModel->id;
            $items[] = [
                'model' => $model::find($id),
                'quantity' => $item->quantity
            ];
        }
        $user = auth()->user();
        $amounts = [];
        $products = [];
        $code = session()->get('code');
        foreach($items as $item){
            [$amount, $discounts] = $item['model']->finalPrice($item['quantity'],$code, true);
            $amounts[] = $amount * $item['quantity'];
            $item['discounts'] = $discounts;
            $item['amount'] = $amount;
            $products[] = $item;
        }
        $totalAmount = array_sum($amounts);
        if($totalAmount <= 0){
            // todo
            dd('free');
        }

        // dd($products);
        PaymentService::generate($products, $user, $totalAmount);
        resolve(Gateway::class)->redirect();
    }


}
