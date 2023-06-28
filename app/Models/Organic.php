<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organic extends Model
{
    use Translatable ,HasFactory;
    public $translationModel = OrganicTranslation::class;
    protected $table = 'organic';
    protected $guarded = [];
    public $timestamps = false;

    public array $translatedAttributes = ['title','text', 'description'];
}
