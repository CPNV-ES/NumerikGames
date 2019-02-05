<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prose;
use App\Theme;
use App\Verse;
use Illuminate\Support\Facades\Auth;

/**
 * ThemeController
 *
 * @author Nicolas Henry
 * @package App\Http\Controllers\Theme
 */
class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $themes = Theme::all();
        if (Auth::check()) {
            return view('themes.index')->with(compact('themes'));
        }
        return view('welcome')->with(compact('themes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = new Theme($request->all());
        $theme->save();
        return redirect()->route('themes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return view('themes.show')->with(compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('themes.edit')->with(compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $theme->fill($request->all());
        $theme->save();
        return redirect()->route('themes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Theme $theme)
    {
        $prose = Prose::where('theme_id', $theme->id)->first();
        if ($prose) {
            $request->session()->flash('bug', 'Ce thème contient des proses, supprimez les proses avant de recommencer.');
        } else {
            $theme->delete();
            $request->session()->flash('success', 'Vous avez bien supprimez '.$theme->name);
        }
        return redirect()->route('themes.index');
    }

    public function themes()
    {
        $themes = Theme::all();
        return view('welcome')->with(compact('themes'));
    }
}
