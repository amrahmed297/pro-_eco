<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // ➕ إضافة منتج للسلة
    public function add(Request $request, $productId)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
    }

    $user_id = Auth::id();

    $product = Product::findOrFail($productId);

    // تحقق إذا الكمية المتوفرة تسمح بالإضافة
    if ($product->quantity <= 0) {
        return back()->with('error', 'الكمية غير متوفرة حالياً لهذا المنتج');
    }

    $existing = Cart::where('user_id', $user_id)
                    ->where('product_id', $productId)
                    ->first();

    if ($existing) {
        if ($product->quantity < $existing->quantity + 1) {
            return back()->with('error', 'لا يوجد كمية كافية من المنتج');
        }

        $existing->increment('quantity');
    } else {
        Cart::create([
            'user_id' => $user_id,
            'product_id' => $productId,
            'quantity' => 1
        ]);
    }

    // 🟡 نقص الكمية من المنتج
    $product->decrement('quantity');

    return back()->with('success', '✅ تم إضافة المنتج إلى السلة');
}


    // 🛒 عرض محتويات السلة
  // 🛒 عرض محتويات السلة

public function index()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

    // حساب السعر الإجمالي
    $total = 0;
    foreach ($cartItems as $item) {
        if ($item->product) {
            $total += $item->product->price * $item->quantity;
        }
    }

    return view('cart.index', compact('cartItems', 'total'));
}




    
    // ❌ حذف منتج من السلة
    public function remove($id)
{
    $item = Cart::findOrFail($id);

    if ($item->user_id != Auth::id()) {
        abort(403, 'غير مسموح');
    }

    // ✅ إرجاع الكمية إلى جدول المنتجات
    if ($item->product) {
        $item->product->increment('quantity', $item->quantity);
    }

    $item->delete();

    return back()->with('success', '🗑️ تم حذف المنتج من السلة');
}

}