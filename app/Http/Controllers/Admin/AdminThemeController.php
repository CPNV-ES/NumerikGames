<?php

namespace App\Http\Controllers\Admin;

use App\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prose;
use Illuminate\Support\Facades\Storage;

/**
 * AdminThemeController
 *
 * @author Nicolas Henry
 * @package App\Http\Controllers\Admin\AdminThemeController
 */
class AdminThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        return view('admin.themes.index')->with(compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.themes.create');
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
        $theme->path = $request->file('path')->store('pictures/themes');
        $theme->save();
        return redirect()->route('admin.themes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        $proses = Prose::with(['verse' => function ($query) {
            $query->where('status', 1);     
        }])->where('theme_id', $theme->id)->get();

        return view('admin.themes.show')->with(compact('theme', 'proses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('admin.themes.edit')->with(compact('theme'));
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
        return redirect()->route('admin.themes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Theme $theme)
    {
        $prose = Prose::where('theme_id', $theme->id)->first();
        if ($prose) {
            $request->session()->flash('bug', 'Ce thème contient des proses, supprimez les proses avant de recommencer.');
        } else {
            $theme->delete();
            $request->session()->flash('success', 'Vous avez bien supprimez '.$theme->name);
        }
        return redirect()->route('admin.themes.index');
    }
}
