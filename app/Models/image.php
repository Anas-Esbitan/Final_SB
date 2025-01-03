<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'product_id']; // تأكد من أنك تقوم بتخزين مسار الصورة و `product_id`

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function images()
{
    return $this->hasMany(Image::class);
}
}