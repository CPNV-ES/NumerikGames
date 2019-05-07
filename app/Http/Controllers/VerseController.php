<?php

namespace App\Http\Controllers;

use App\Prose;
use App\Theme;
use App\Verse;
use Illuminate\Http\Request;
use App\Setting;

/**
 * VerseController
 *
 * @author Nicolas Henry
 * @package App\Http\Controllers\Verse
 */
class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $verses = Verse::all();
        return view('verses.index')->with(compact('verses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proses = Prose::all();
        return view('verses.create')->with(compact('proses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prose = Prose::find($request->get('prose_id'));
          /* if ($countSyllables > 12){
              return back()->with('error', 'Votre vers contient plus de 12 syllabes ! Il y en avait '. $countSyllables);
          } */

        if($prose->is_full()) {
            $prose->is_full = 1;
            $prose->save();
            $newProse = new Prose();
            $newProse->title = $prose->theme->name;
            $newProse->theme_id = $prose->theme->id;
            $newProse->save();
            $request->session()->flash('error', 'Malheureusement cette resource n\'a pas fonctionné correctement, choisissez une autre prose.');
            return redirect()->back();
        } else {
            $verse = new Verse($request->all());
            
            $verse->save();
            if ($prose->verse->count()+1 == Setting::where('name', 'default_limit')->first()->value) {
                $prose->is_full = 1;
                $prose->save();
                $newProse = new Prose();
                $newProse->title = $prose->theme->name;
                $newProse->theme_id = $prose->theme->id;
                $newProse->save();
            }
            $request->session()->flash('success', 'Votre élément à bien été ajouté, pour votre participation.');
        }
        $themes = Theme::all();
        return redirect()->route('home')->with(compact('themes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function show(Verse $verse)
    {
        if ($verse->status == 1) {
            $verse->status = 'actif';
        } else {
            $verse->status = 'inactif';
        }
        return view('verses.show')->with(compact('verse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function edit(Verse $verse)
    {
        $proses = Prose::all();
        return view('verses.edit')->with(compact('verse', 'proses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verse $verse)
    {
        $verse->fill($request->all());
        $verse->save();
        return redirect()->route('verses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verse $verse)
    {
        $verse->delete();
        return redirect()->route('verses.index');
    }

    /**
     * Count the number of syllables.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequestPost(Request $request)
    {
        $verse = $request->verse;
        $sylablleCount = Verse::countSyllable($verse, 'fr');

        return response()->json(['success' => true, 'data' => $sylablleCount]);
    }
}
