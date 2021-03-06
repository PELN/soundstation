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
use App\Models\Year;
use App\Models\CatalogueNumber;
use App\Models\Grading;
use App\Models\Comment;
use App\Models\Color;

class Product extends Model
{
    /**
    * @var string
    */
    protected $table = 'products';

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

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function year()
    {
        return $this->belongsToMany(Year::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function cataloguenumber()
    {
        return $this->hasOne(CatalogueNumber::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function gradings()
    {
        return $this->belongsToMany(Grading::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function color()
    {
        return $this->belongsToMany(Color::class);
    }
    
}