<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Comment extends Model
{
 /**
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var array
     */
    protected $fillable = ['comment', 'product_id'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
