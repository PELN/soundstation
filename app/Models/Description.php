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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
