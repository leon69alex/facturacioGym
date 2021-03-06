<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuote;

class CuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuotes = Cuote::all();
        
        return view('cuotes.index', compact('cuotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cuote::create($request->all());

        $cuotes = Cuote::all();
        
        return view('cuotes.index', compact('cuotes'))->with('info', 'Quota creada correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuote = Cuote::findOrFail($id);

        return view('cuotes.edit', compact('cuote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cuote = Cuote::findOrFail($id);

        $cuote->update($request->all());

        return redirect()->route('cuotes.index')->with('info', 'La quota s\'ha actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuote = Cuote::findOrFail($id);

        $cuote->delete();

        return redirect()->route('cuotes.index')->with('info', 'La quota s\'ha eliminat correctament');
    }
}
