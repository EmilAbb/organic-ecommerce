<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{
   use Translatable;
   public $translationModel = CategoryTranslation::class;
   protected $table = 'categories';
   protected $guarded = [];
   public array $translatedAttributes = ['title','slug'];
}
