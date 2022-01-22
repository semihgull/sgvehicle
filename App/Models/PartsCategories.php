<?php

namespace App\models;

use Kalnoy\Nestedset\NodeTrait;

class PartsCategories extends \Core\Model
{

    protected $fillable = [
        'category-name',
        'parent-category'
    ];

    public function parent()
    {
        return $this->belongsTo('App\models\PartsCategories', "parent-category");

    }
    
    public function childs()
    {
        return $this->hasMany('App\models\PartsCategories', "parent-category", "id");
    }

}