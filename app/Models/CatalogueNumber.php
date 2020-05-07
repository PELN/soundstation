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
    protected $fillable = 'cat_no';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
