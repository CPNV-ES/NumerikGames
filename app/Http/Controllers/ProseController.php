<?php

namespace App\Http\Controllers;

use App\Prose;
use App\Theme;
use App\Verse;
use Illuminate\Http\Request;

/**
 * ProseController
 *
 * @author Nicolas Henry
 * @package App\Http\Controllers\Prose
 */
class ProseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Verse $verse)
    {
        foreach (Prose::all() as $value) {
            $proses = collect($value->only_with_data());
        }

        return view('proses.index')->with(compact('proses', 'verse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        return view('proses.create')->with(compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prose = new Prose($request->all());
        $prose->save();
        return redirect()->route('proses.index');
    }

    /**
     * Display the specified resource.
     * Get all verse where id is same than prose.
     * Seperate the active and inactive verse.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function show(Prose $prose)
    {
        $verses = Verse::where('prose_id', $prose->id)->get();
        $inactivateVerses = $verses->where('status', 0);
        $versesLast = $verses->sortByDesc('created_at')->take(4);
        $verses = $verses->where('status', 1);
        $versesLast = $versesLast->reverse();
        

        return view('proses.show')->with(compact('prose', 'verses', 'inactivateVerses', 'versesLast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function edit(Prose $prose)
    {
        $themes = Theme::all();
        return view('proses.edit')->with(compact('prose', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prose $prose)
    {
        $prose->fill($request->all());
        $prose->save();
        return redirect()->route('proses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Prose $prose)
    {
        $verse = Verse::where('prose_id', $prose->id)->first();
        if ($verse) {
            $request->session()->flash('bug', 'Cette prose contient des vers, supprimez les vers avant de recommencer.');
        } else {
            $prose->delete();
            $request->session()->flash('success', 'Vous avez bien supprimez '.$prose->title);
        }
        return redirect()->route('proses.index');
    }
    
    /**
     * Get value from origin
     * The verse_count column is creater by Laravel in the eloquent query, you can see the log to see the query in App\Providers\AppServiceProvider
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function projector()
    {
        foreach (Prose::all() as $value) {
            $proses = collect($value->only_with_data());
        }

        return view('projectors.index')->with(compact('proses'));
    }
}
