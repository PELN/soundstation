<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Subgenre;
use App\Models\Image;
use App\Models\Description;
use App\Models\Artist;
use App\Models\Country;
use App\Models\Format;
use App\Models\Label;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'slug', 'quantity',
        'price', 'sale_price', 'status', 'featured',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'category_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];

     /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function subgenres()
    {
        return $this->belongsToMany(Subgenre::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function description()
    {
        return $this->hasOne(Description::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function country()
    {
        return $this->belongsToMany(Country::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function formats()
    {
        return $this->belongsToMany(Format::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

}