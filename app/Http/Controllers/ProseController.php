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
        return view('proses.create');
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
     *
     * @param  \App\Prose  $prose
     * @return \Illuminate\Http\Response
     */
    public function show(Prose $prose, Request $request)
    {
        return view('proses.show');
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
