<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prose;
use App\Theme;
use App\Verse;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            return view('verses.create')->with(compact('proses'));
        }
        /* Get all verse from correct prose */
        
        $verses = Verse::all();
        return view('game.index')->with(compact('verses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if (Auth::check()) {
            $verse = new Verse($request->all());
            $verse->save();
            return redirect()->route('verses.index');
        }
        dd('store method');
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
}
