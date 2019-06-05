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
        'word_flag',
    ];
    
    public function prose()
    {
        return $this->belongsTo('App\Prose', 'prose_id');
    }


    /**
     * Return the number of syllables of a verse.
     *
     * @param  string $verse
     * @param string $lang
     */
    public static function countSyllable($verse, $lang)
    {
        // Create a new instance for the language
        $syllable = new \Syllable($lang);

        // Set the directory where Syllable can store cache files
        $syllable->getCache()->setPath(base_path(). '/bootstrap/cache');

        // Count the number of syllable in a text
        $syllableCount = $syllable->countSyllablesText($verse);

        return $syllableCount;
    }
}
