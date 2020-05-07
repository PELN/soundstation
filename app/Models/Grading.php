<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Grading extends Model
{
    /**
    * @var string
    */
    protected $table = 'gradings';
    protected $fillable = 'grading';
    
    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
