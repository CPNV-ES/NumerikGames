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
        'path',
        'theme_id',
        'is_projectable',
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
     * @param  Integer $limit is the limit if we need a special limit
     * @return Boolean
     */
    public function is_full($limit = null)
    {
        isset($limit) ? $limit : $limit = Setting::where('name', 'limit_verses')->first()->value ;
        $contains = count($this->verse);
        if ($contains >= $limit) {
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
        $proses = Prose::inRandomOrder()->with(['verse' => function ($query) {
            $query->where('status', 1);
        }])->withCount(['verse' => function ($query) {
            $query->where('status', 1);
        }])->having('verse_count', '>', 0)->get();
        return $proses->where('is_projectable', 1);
    }

    /**
     * Generate new prose with new verses
     *
     * @param  Object $oldProse is the current prose you work with
     * @return
     */
    public static function setDefault($oldProse) {
        $prose = new Prose();
        $prose->title = $oldProse->theme->name;
        $prose->theme_id = $oldProse->theme->id;
        $prose->path = $oldProse->path;
        $prose->save();

        for ($i = 1; $i < 3; $i++) {
            $vers = new Verse();
            $vers->content = Setting::where('name', "default_vers_$i")->first()->value;
            $vers->prose_id = $prose->id;
            $vers->status = 1;
            $vers->save();
        }
    }


    public static function flagged_verse($prose) {
        $i = 0;
        foreach ($prose->verse as $verse) {
            if ($verse->word_flag) {
                $i++;
            }
        }
        if ($i) {
            echo "<span class='badge badge-danger'>Cette prose contient $i vers suspect.</span>";
        }
    }
}
