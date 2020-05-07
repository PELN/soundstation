<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Description extends Model
{
   /**
     * @var string
     */
    protected $table = 'descriptions';

    /**
     * @var array
     */
    protected $fillable = ['description', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
