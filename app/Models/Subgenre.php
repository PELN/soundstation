<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Subgenre extends Model
{
    /**
    * @var string
    */
    protected $table = 'subgenres';

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
