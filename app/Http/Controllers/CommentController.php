<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
          if (!Auth::check()) {
        // Auth Login
        return redirect()->route('login')->with('error', 'You need to be logged in to add a comment.');
    }
        // validate input
        $request->validate([
            'comment' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

    
        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    
}
