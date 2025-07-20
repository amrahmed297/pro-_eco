<?php

namespace App\Http\Controllers;
use App\Models\cat;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // عرض المنتجات حسب القسم
    public function index(Request $request)
    {
        $categoryId = $request->query('category');
        $categories = Cat::all();

        $products = Product::when($categoryId, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        })->paginate(6);

        return view('cat', compact('products', 'categories', 'categoryId'));
    }

    // عرض نموذج إضافة قسم جديد
    public function add()
    {
     return view('category.addcategory');
    }

    // تخزين القسم في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:category,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destination = public_path('assets/img/categories');
        $image->move($destination, $imageName);
        $imagePath = 'assets/img/categories/' . $imageName;

        Cat::create([
            'name' => $request->name,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', '✅ تم إضافة القسم بنجاح!');
    }

    // عرض نموذج تعديل القسم
    public function edit(string $id)
    {
        $category = Cat::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    // تحديث بيانات القسم
    public function update(Request $request, string $id)
    {
        $category = Cat::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:category,name,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('assets/img/categories');
            $image->move($destination, $imageName);
            $category->image_path = 'assets/img/categories/' . $imageName;
        }

        $category->save();

        return redirect()->back()->with('success', '✅ تم تحديث القسم بنجاح!');
    }

    // حذف القسم
    public function destroy(string $id)
    {
        $category = Cat::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', '✅ تم حذف القسم بنجاح!');
    }
  
}
