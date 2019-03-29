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

    /**
     * Count number of verse in your prose, return boolean if the number is more important than Settings table value.
     *
     * @return Boolean
     */
    public function is_full() 
    {
        $contains = count($this->verse);
        if ($contains >= Setting::where('name', 'default_limit')->first()->value) {
            return true;
        } else {
            return false;
        };
    }


    /**
     * Filter proses with verses where status = 1 else nothing is return.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function only_with_data() 
    {
        $proses = Prose::with(['verse' => function ($query) {
            $query->where('status', 1);
        }])->withCount(['verse' => function ($query) {
            $query->where('status', 1);
        }])->having('verse_count', '>', 0)->get();
        return $proses;
    }
}
