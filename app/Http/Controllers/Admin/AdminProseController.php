<?php

namespace App\Http\Controllers\Admin;

use App\Prose;
use App\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * AdminProseController
 *
 * @author Nicolas Henry
 * @package App\Http\Controllers\Admin\AdminProseController
 */
class AdminProseController extends Controller
{
    /**
     * Control if the resource exist in the current domain.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ( $request->theme->id == $request->prose->theme_id) {
                return $next($request);
            } else {
                return abort(404);
            }
        }, ['except' => ['index', 'create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Theme $theme)
    {
        $proses = Prose::all()->where('theme', $theme);
        return view('admin.proses.index', $theme)->with(compact('theme', 'proses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Theme $theme)
    {
        $themes = Theme::all();
        return view('admin.proses.create', $theme)->with(compact('themes', 'theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Theme $theme, Request $request)
    {
        $prose = new Prose($request->all());
        $prose->theme_id = $theme->id;
        $prose->save();
        return redirect()->route('admin.themes.proses.index', $theme);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme, Prose $prose)
    {
        return view('admin.proses.show', $theme)->with(compact('prose', 'theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme, Prose $prose)
    {
        $themes = Theme::all();
        return view('admin.proses.edit')->with(compact('prose', 'theme', 'themes'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prose $prose)
    {
        //
    }
}
