<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model implements TranslatableContract
{
    use Translatable ,HasFactory;

    public $translationModel = CategoryTranslation::class;
    protected $table = 'categories';
    protected $guarded = [];
    public array $translatedAttributes = ['title', 'slug'];

    protected static function newFactory()
    {
      return  CategoryFactory::new();
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function attributes() :BelongsToMany
    {
        return $this->belongsToMany(Attribute::class,AttributeCategory::class,'category_id','attribute_id');
    }
}
