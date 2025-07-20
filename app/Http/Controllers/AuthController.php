<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
    /**
     * عرض صفحة تسجيل المستخدم.
     *
     * @return \Illuminate\View\View
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * معالجة بيانات التسجيل وتخزين المستخدم الجديد.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'تم التسجيل بنجاح! يمكنك تسجيل الدخول الآن');
    }

    /**
     * عرض صفحة تسجيل الدخول للمستخدم.
     *
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * محاولة تسجيل الدخول للمستخدم.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect('/');
        }

        return redirect()->back()->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
    }

    /**
     * تسجيل خروج المستخدم.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * عرض صفحة تسجيل دخول الأدمن.
     *
     * @return \Illuminate\View\View
     */
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    /**
     * محاولة تسجيل دخول الأدمن.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'is_admin_logged_in' => true,
                'admin_id' => $admin->id,
                'admin_name' => $admin->name,
                'is_super' => $admin->is_super
            ]);

            return redirect('/')->with('success', 'تم تسجيل دخول الأدمن بنجاح');
        }

        return back()->with('error', 'بيانات الدخول غير صحيحة');
    }

    /**
     * تسجيل خروج الأدمن.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAdmin()
    {
        session()->forget(['is_admin_logged_in', 'admin_id', 'admin_name', 'is_super']);
        return redirect()->route('admin.login')->with('success', 'تم تسجيل الخروج بنجاح');
    }

    /**
     * عرض نموذج إنشاء أدمن جديد (خاص بالسوبر أدمن).
     *
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function createAdmin()
    {
        if (!session('is_super')) {
            abort(403, 'غير مصرح لك');
        }

        return view('admin.create');
    }

    /**
     * تخزين أدمن جديد (خاص بالسوبر أدمن).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function storeAdmin(Request $request)
    {
        if (!session('is_super')) {
            abort(403, 'غير مصرح لك');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_super' => $request->has('is_super') ? 1 : 0
        ]);

        return redirect()->back()->with('success', 'تم إنشاء الأدمن بنجاح');
    }
}
