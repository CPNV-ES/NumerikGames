<?php

namespace App\Http\Controllers\Admin;

use App\Verse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prose;
use App\Theme;

/**
 * AdminVerseController
 *
 * @author Nicolas Henry
 * @package App\Http\Controllers\Admin\AdminVerseController
 */
class AdminVerseController extends Controller
{
    /**
     * Control if the resource exist in the current domain.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ( $request->theme->id == $request->prose->theme_id || $request->prose->id == $request->verse->prose_id) {
                return $next($request);
            } else {
                return abort(404);
            }
        }, 
        ['except' => ['index', 'create', 'store', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Theme  $theme
     * @param \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function index(Theme $theme, Prose $prose)
    {
        $verses = Verse::all()->where('prose', $prose);
        return view('admin.verses.index', $prose)->with(compact('theme', 'prose', 'verses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Theme  $theme
     * @param \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function create(Theme $theme, Prose $prose)
    {
        $proses = Prose::all();
        return view('admin.verses.create')->with(compact('theme', 'prose', 'proses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Theme $theme, Prose $prose)
    {
        $verse = new Verse($request->all());
        $verse->save();
        return redirect()->route('admin.themes.proses.verses.index', ['theme' => $theme, 'prose' => $prose]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function show(Verse $verse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @param  \App\Prose  $prose
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme, Prose $prose, Verse $verse)
    {
        $themes = Theme::all();
        $proses = Prose::all();
        return view('admin.verses.edit')->with(compact('theme', 'prose', 'verse', 'themes', 'proses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @param  \App\Prose  $prose
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme, Prose $prose, Verse $verse)
    {
        $verse->fill($request->all());
        $verse->save();
        return redirect()->route('admin.themes.proses.verses.index', ['theme' => $theme, 'prose' => $prose]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verse $verse)
    {
        //
    }
}
