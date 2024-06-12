<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'text',
    ];

    public function scopeFilter($query){
        if (request('search')){
            return $query->where('title', 'like', '%' . request('search') . '%');
        }

    }

}
