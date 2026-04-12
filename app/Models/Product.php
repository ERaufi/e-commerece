<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function scopeDraft($query)
    {
        return $query->where('status','draft');
    }

    public function scopeStatus($query,$stutsType)
    {
        return $query->where('status',$stutsType);
    }
}
