<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGenre extends Model
{

    /**
     * @var string
     */
    protected $table = 'product_genres';
    protected $fillable = 'genre';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

}
