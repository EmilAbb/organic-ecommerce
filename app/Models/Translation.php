<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Translation extends Model
{
    use HasTranslations;

    protected $table = 'translations';
    public $timestamps = false;
    protected $guarded = [];
    public array $translatable = ['value'];
}
