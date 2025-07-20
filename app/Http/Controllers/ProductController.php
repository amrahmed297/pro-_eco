<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
 use App\Models\Cat;

class ProductController extends Controller
{


public function index()
{
    $categories = Cat::all();
    $products = Product::all();
    
    return view('welcome', compact('categories', 'products'));
}


public function addproduct()
{
     $categories = Cat::all(); // استرجاع كل التصنيفات من جدول categories
    return view('products.addproduct', compact('categories'));

}

    /**
     * Show the form for creating a new resource.
     */
 public function store(Request $request)
{
    // ✅ التحقق من صحة البيانات
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required|exists:category,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // ✅ رفع الصورة إلى public/assets/img/products
    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $destination = public_path('assets/img/products');
    $image->move($destination, $imageName);

    // ✅ مسار الصورة الذي سيتم حفظه في قاعدة البيانات
    $imagePath = 'assets/img/products/' . $imageName;

//حفظ البيانات 
$request->merge(['image_path' => $imagePath]);
Product::create($request->only(['name', 'price', 'quantity', 'category_id', 'image_path']));

    // ✅ الرجوع برسالة نجاح
    return redirect()->back()->with('success', '✅ تم حفظ المنتج بنجاح!');
}
public function all()
{
    $products = Product::with('category')->get();
    $categories = Cat::all();
   return view('products.all', compact('products', 'categories'));

}
public function delete($id)
{
    $product = Product::findOrFail($id);

    // حذف الصورة من السيرفر
    if (file_exists(public_path($product->image_path))) {
        unlink(public_path($product->image_path));
    }

    $product->delete();

    return redirect()->route('all.view')->with('success', 'تم حذف المنتج بنجاح');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $product = Product::findOrFail($id);
    $categories = Cat::all();
    return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required|exists:category,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->category_id = $request->category_id;

    // ✅ تحديث الصورة لو تم رفع صورة جديدة
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/img/products'), $imageName);
        $product->image_path = 'assets/img/products/' . $imageName;
    }

    $product->save();

    return redirect()->route('all.view')->with('success', '✅ تم تحديث المنتج بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
