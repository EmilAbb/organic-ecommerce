<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use Translatable ,HasFactory;
    public $translationModel = MenuTranslation::class;
    protected $table = 'menus';
    protected $guarded = [];
    public $timestamps = false;

    public array $translatedAttributes = ['title'];


    public function parent():BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id','id');
    }

    public function children():HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id','id');
    }
}
