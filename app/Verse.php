<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Verse
 * Verses model
 *
 * @author Nicolas Henry
 * @package App
 */
class Verse extends Model
{
    protected $fillable = [
        'content',
        'status',
        'prose_id',
    ];
    
    public function prose()
    {
        return $this->belongsTo('App\Prose', 'prose_id');
    }
}
