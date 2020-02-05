<?php

namespace App\Http\Controllers;

use App\Callback;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callbacks = Callback::paginate(20);
        return view('admin.callbacks.index', compact('callbacks'));
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
     * @param  \App\Callback  $callback
     * @return \Illuminate\Http\Response
     */
    public function show(Callback $callback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Callback  $callback
     * @return \Illuminate\Http\Response
     */
    public function edit(Callback $callback)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Callback  $callback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Callback $callback)
    {
        $processed = $request->processed;
        $callback->update(['processed' => $processed]);
        return $processed;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Callback  $callback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Callback $callback)
    {
        //
    }
}
