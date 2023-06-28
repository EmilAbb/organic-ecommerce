<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMap extends Model
{
    use Translatable ,HasFactory;
    public $translationModel = ContactMapTranslation::class;
    protected $table = 'contact_map';
    protected $guarded = [];
    public $timestamps = false;

    public array $translatedAttributes = ['title','phone', 'text'];
}
