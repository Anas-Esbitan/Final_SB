<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function images() {
    return $this->hasMany(Image::class);
}
public function comments()
{
    return $this->hasMany(Comment::class);
}
public function isFavorited()
{
    $user = Auth::user();
    if (!$user) {
        return false; // إذا لم يكن المستخدم مسجل دخول
    }

    return $this->wishlists()->where('user_id', $user->id)->exists();
}
public function wishlists()
{
    return $this->belongsToMany(User::class, 'wishlist', 'product_id', 'user_id');
}

}