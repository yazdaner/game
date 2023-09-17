<?php

namespace Yazdan\Cart\App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Yazdan\Coin\App\Models\Coin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function index()
    {
        return view('Cart::index');
    }

    public function add(Request $request,$productModel,$productId)
    {
        $request->validate([
            'count' => 'required',
        ]);

        $product = $productModel::find($productId);


        $rowId = auth()->id() . '-' . $productModel .'-'.  $productId;


        if (\Cart::get($rowId) == null) {
            \Cart::add(array(
                'id' => $rowId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->count,
                'attributes' => $product->toArray(),
                'associatedModel' => $product
            ));
        } else {
            newFeedbacks('دقت کنید','محصول مورد نظر به سبد خرید شما اضافه شده است','error');
            return redirect()->back();
        }

        newFeedbacks();
        return redirect()->back();
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'qtybutton' => 'required'
    //     ]);

    //     foreach ($request->qtybutton as $rowId => $quantity) {

    //         $item = Cart::get($rowId);

    //         if ($quantity > $item->attributes->quantity) {
    //             alert()->error('تعداد وارد شده از محصول درست نمی باشد', 'دقت کنید');
    //             return redirect()->back();
    //         }

    //         Cart::update($rowId, array(
    //             'quantity' => array(
    //                 'relative' => false,
    //                 'value' => $quantity
    //             ),
    //         ));
    //     }

    //     alert()->success('سبد خرید شما ویرایش شد', 'باتشکر');
    //     return redirect()->back();
    // }

    // public function remove($rowId)
    // {
    //     Cart::remove($rowId);

    //     alert()->success('محصول مورد نظر از سبد خرید شما حذف شد', 'باتشکر');
    //     return redirect()->back();
    // }

    // public function clear()
    // {
    //     Cart::clear();

    //     alert()->warning('سبد خرید شما پاک شد', 'باتشکر');
    //     return redirect()->back();
    // }

    // public function checkCoupon(Request $request)
    // {
    //     $request->validate([
    //         'code' => 'required'
    //     ]);

    //     if (!auth()->check()) {
    //         alert()->error('برای استفاده از کد تخفیف نیاز هست ابتدا وارد وب سایت شوید', 'دقت کنید');
    //         return redirect()->back();
    //     }

    //     $result = checkCoupon($request->code);

    //     if (array_key_exists('error', $result)) {
    //         alert()->error($result['error'], 'دقت کنید');
    //     } else {
    //         alert()->success($result['success'], 'باتشکر');
    //     }
    //     return redirect()->back();
    // }

    // public function checkout()
    // {
    //     if (\Cart::isEmpty()) {
    //         alert()->warning('سبد خرید شما خالی میباشد', 'دقت کنید');
    //         return redirect()->route('home.index');
    //     }

    //     $addresses = UserAddress::where('user_id', auth()->id())->get();
    //     $provinces = Province::all();

    //     return view('home.cart.checkout', compact('addresses' , 'provinces'));
    // }

    // public function usersProfileIndex()
    // {
    //     $orders = Order::where('user_id' , auth()->id())->get();
    //     return view('home.users_profile.orders' , compact('orders'));
    // }
}
