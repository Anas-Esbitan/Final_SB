<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\categories;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'user', 'images')->paginate(1);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = categories::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
          $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'status' => 'required|in:New,used,Used in new condition',
        'category_id' => 'required|exists:categories,id',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

        // إنشاء المنتج
        $product = Product::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        // حفظ الصور إذا وُجدت
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                Image::create([
                    'product_id' => $product->id,
                    'path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $categories = categories::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
          $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'status' => 'required|in:New,used,Used in new condition',
        'category_id' => 'required|exists:categories,id',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

        $product = Product::findOrFail($id);

        // تحديث بيانات المنتج
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        // حفظ الصور الجديدة
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                Image::create([
                    'product_id' => $product->id,
                    'path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // حذف الصور من التخزين
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->path);
            $image->delete();
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
    //User create Product
    
}