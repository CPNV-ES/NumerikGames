<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Setting
 * Settings model
 *
 * @author Nicolas Henry
 * @package App
 */
class Setting extends Model
{
    protected $fillable = [
        'name',
        'value',
    ];
}
