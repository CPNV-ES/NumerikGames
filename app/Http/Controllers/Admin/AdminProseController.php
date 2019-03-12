<?php

namespace App\Http\Controllers\Admin;

use App\Prose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Theme;

/**
 * AdminProseController
 *
 * @author Nicolas Henry
 * @package App\Http\Controllers\Admin\AdminProseController
 */
class AdminProseController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function show(Prose $prose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function edit(Prose $prose)
    {
        //
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
