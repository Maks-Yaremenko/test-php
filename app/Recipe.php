<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
    
    protected $table = 'recipes';


    /**
    * Получить все задачи пользователя.
    */
    public function ingredients()
    {
        return $this->belongsToMany('App/Ingredient', 'ingredient_recipe', 'recipe_id', 'ingredient_id')->withTimestamps();
    }
}
