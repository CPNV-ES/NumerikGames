<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Prose
 * Proses model
 *
 * @author Nicolas Henry
 * @package App
 */
class Prose extends Model
{
    protected $fillable = [
        'title',
        'theme_id',
    ];

    public function theme()
    {
        return $this->belongsTo('App\Theme', 'theme_id');
    }

    public function verse()
    {
        return $this->hasMany('App\Verse');
    }

    public function is_full() 
    {
        $contains = count($this->verse);
        if ($contains >= Setting::where('name', 'default_limit')->first()->proses_limit) {
            return true;
        } else {
            return false;
        };
    }
}
