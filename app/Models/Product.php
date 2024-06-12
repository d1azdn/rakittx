<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'product_name',
        'brand_id',
        'category_id',
        'desc',
        'price',
        'stock',
        'discount'
    ];

    protected $hidden = [
        'password',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function scopeFilter($query, array $filter){
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('product_name', 'like', '%' . $search . '%');
        });

        $query->when($filter['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function ($query) use ($category){
                $query->where('title', $category);
            });
        });
    }

}
