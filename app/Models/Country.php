<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Country extends Model
{
    /**
    * @var string
    */
    protected $table = 'countries';
    protected $fillable = 'country';

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
