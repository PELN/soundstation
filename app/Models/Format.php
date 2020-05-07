<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Format extends Model
{
 /**
    * @var string
    */
    protected $table = 'formats';
    protected $fillable = 'format';

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
