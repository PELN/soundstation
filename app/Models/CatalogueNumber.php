<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CatalogueNumber extends Model
{
  /**
     * @var string
     */
    protected $table = 'catalogue_numbers';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
