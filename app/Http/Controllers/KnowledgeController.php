<?php

namespace App\Http\Controllers;

use App\knowledge;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('know_managment.know.index',[
            'knows' => knowledge::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('know_managment.know.create',[
            'know'=>[''],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        knowledge::create([
            'theme' => $request['theme'],
            'text' => $request['text']
        ]);

        return redirect()->route('knowledge.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function edit(knowledge $knowledge)
    {
        return view('know_managment.know.edit',[
            'know' => $knowledge
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, knowledge $knowledge)
    {
        if(isset($request['theme'])) $knowledge->theme = $request['theme'];
        if(isset($request['text'])) $knowledge->text = $request['text'];
        $knowledge->save();

        return redirect()->route('knowledge.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function destroy(knowledge $knowledge)
    {
        $knowledge->delete();
        return redirect()->route('knowledge.index');
    }
}
