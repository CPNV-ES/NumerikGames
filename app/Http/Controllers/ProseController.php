<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prose;
use App\Theme;
use App\Verse;

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
    public function index(Request $request)
    {
        $proses = Prose::all();
        return view('proses.index')->with(compact('proses'));
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
    public function show(Prose $prose, Request $request)
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
    public function destroy(Prose $prose)
    {
        dd($prose);
    }
}
