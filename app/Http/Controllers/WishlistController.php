<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        //  $products = Product::with('images')->get();
       $wishlistItems = Wishlist::with('product')->where('user_id', auth()->id())->get();
    return view('userside.wishlist', compact('wishlistItems'));
}
   public function store(Request $request) {
    $product_id = $request->product_id;

    // Check if the product is already in the user's wishlist
    $wishlistItem = Wishlist::where('user_id', Auth::id())
                            ->where('product_id', $product_id)
                            ->first();

    if ($wishlistItem) {
        // If the item exists, remove it from the wishlist
        $wishlistItem->delete();
        return response()->json(['success' => true, 'favorited' => false]);
    } else {
        // If the item does not exist, add it to the wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id
        ]);
        return response()->json(['success' => true, 'favorited' => true]);
    }
}

    public function destroy($id) {
        Wishlist::where('id', $id)->where('user_id', Auth::id())->delete();
        return back()->with('success', 'Product removed from Wishlist!');
    }
}