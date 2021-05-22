<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'ops_percentage'];    

    public function programs()
    {
        return $this->hasMany('App\Program');
    }

    public function getRouteKeyName()
    {
        return 'category_name';
    }

}
