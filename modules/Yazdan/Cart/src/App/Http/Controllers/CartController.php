<?php

namespace Yazdan\Cart\App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Yazdan\Coin\App\Models\Coin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

        $rowId = auth()->id() . '-' . $productModel . '-' .  $productId;

        if (\Cart::get($rowId) == null) {
            \Cart::add(array(
                'id' => $rowId,
                'name' => $product->title,
                'price' => $product->price,
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

            $item = Cart::get($rowId);

            Cart::update($rowId, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
            ));
        }

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
        newFeedbacks('با موفقیت', 'سبد خرید شما پاک شد', 'success');
        return back();
    }

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

    public function buy()
    {
        foreach (\Cart::getContent() as $item){
            // dd($item->quantity);
            dd($item->associatedModel);
        }

        $course = CourseRepository::findById($courseId);
        if (!$this->courseCanBePurchased($course)) {
            return back();
        }
        if (!$this->authUserCanPurchaseCourse($course)) {
            return back();
        }

        $user = auth()->user();
        [$amount, $discounts] = $course->finalPrice(request()->code, true);
        if($amount <= 0){
            resolve(CourseRepository::class)->addStudentToCourse($course,$user);
            newFeedbacks();
            return redirect($course->path());
        }


        PaymentService::generate($course, $user, $amount,$discounts);
        resolve(Gateway::class)->redirect();
    }
}
