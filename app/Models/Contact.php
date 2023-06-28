<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Translatable ,HasFactory;
    public $translationModel = ContactTranslation::class;
    protected $table = 'contacts';
    protected $guarded = [];

    public array $translatedAttributes = ['title', 'text'];
}
