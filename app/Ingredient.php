<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    protected $table = 'ingredients';

    /**
   * Получить статью данного комментария.
   */
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe')->withTimestamps();
    }
}
