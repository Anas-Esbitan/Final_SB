<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\categories;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PublicProductController extends Controller
{
    public function showByCategory($id)
{
$products = Product::where('category_id', $id)->simplePaginate(16);
    $categories = categories::all();
    
    return view('userside.index', compact('products', 'categories'));
}

    
  public function index()
{
    $products = Product::simplePaginate(8); 
    $categories = categories::all();  // جلب جميع التصنيفات
    return view('userside.index', compact('products', 'categories'));
}


    public function show($id)
    {
        $product = Product::with('images')->find($id);  
        return response()->json([
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'images' => $product->images->pluck('path')
        ]);
        //=============================
    }
    public function create()
    {
        $categories = categories::all();
        return view('userside.product_create', compact('categories'));
    }

    public function store(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to login to add a product.');
    }

    $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'status' => 'required|in:available,sold,swapped',
        'category_id' => 'required|exists:categories,id',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $product = Product::create([
        'user_id' => auth()->id(),
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'status' => $request->status,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('products', 'public');
            Image::create([
                'product_id' => $product->id,
                'path' => $imagePath,
            ]);
        }
    }

    return redirect()->route('/')->with('success', 'Product added successfully.');
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

        return redirect()->route('user.profile')->with('success', 'Product deleted successfully.');
    }


    // public function edit($id)
    // {
    //     $product = Product::with('images')->findOrFail($id);
    //     $categories = categories::all();
    //     return view('/', compact('product', 'categories'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'description' => 'nullable|string',
    //         'price' => 'nullable|numeric',
    //         'status' => 'required|in:available,sold,swapped',
    //         'category_id' => 'required|exists:categories,id',
    //         'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $product = Product::findOrFail($id);

    //     // تحديث بيانات المنتج
    //     $product->update([
    //         'category_id' => $request->category_id,
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'status' => $request->status,
    //     ]);

    //     // حفظ الصور الجديدة
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $imagePath = $image->store('products', 'public');
    //             Image::create([
    //                 'product_id' => $product->id,
    //                 'path' => $imagePath,
    //             ]);
    //         }
    //     }

    //     return redirect()->route('/')->with('success', 'Product updated successfully.');
    // }
    
}