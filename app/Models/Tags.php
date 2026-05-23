<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;
    //

    public function products()
    {
        return $this->belongsToMany(Tags::class, 'product_tags', 'tag_id', 'product_id');
    }
}
