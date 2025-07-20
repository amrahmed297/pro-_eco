<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $userId = Auth::id();
        $paymentMethod = $request->input('payment_method');

        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'السلة فارغة');
        }

        // هنا ممكن تخزن الطلب في جدول orders لاحقًا

        // لو الدفع عند الاستلام
        if ($paymentMethod === 'cod') {
            // مثلاً ترجع للمستخدم رسالة تأكيد
            Cart::where('user_id', $userId)->delete(); // حذف السلة بعد الطلب
            return redirect('/')->with('success', '✅ تم تأكيد الطلب، سيتم الدفع عند الاستلام.');
        }

        // لو دفع ببطاقة (توجيه لصفحة الدفع)
        if ($paymentMethod === 'card') {
            // ممكن توجه لبوابة دفع حقيقية أو صفحة مزيفة محليًا
            return redirect()->route('payment.card');
        }

        return back()->with('error', 'حدث خطأ أثناء اختيار طريقة الدفع');
    }
}
