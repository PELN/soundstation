<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
   /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @var array
     */
    protected $fillable = ['path', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
