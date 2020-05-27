<?php

namespace App\Models;

use TypiCMS\NestableTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use NestableTrait;

    protected $table = 'categories';


    // adjacency model relationships
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
