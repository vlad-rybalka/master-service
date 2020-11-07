<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'Categories';

    public function subcategories()
    {
        return $this->hasMany('App\Models\Category', 'parent_id')->with('subcategories')->orderBy('sort_order');
    }
}
