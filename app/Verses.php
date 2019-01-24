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
class Verses extends Model
{
    protected $fillable = [
        'content',
        'status',
        'prose_id',
    ];
    
}
