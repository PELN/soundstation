<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Year extends Model
{
    /**
    * @var string
    */
    protected $table = 'years';
    protected $fillable = 'year';
    
    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
