<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Theme
 * Themes model
 *
 * @author Nicolas Henry
 * @package App
 */
class Theme extends Model
{
    protected $fillable = [
        'name',
        'path',
        'color',
    ];

    public function proses()
    {
        return $this->hasMany('App\Prose');
    }

}
