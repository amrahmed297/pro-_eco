<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function card()
    {
        return view('payment.card'); // لازم تعمل ملف blade اسمه card.blade.php داخل مجلد views/payment
    }
}
