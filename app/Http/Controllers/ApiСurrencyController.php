<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ApiСurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uah = 0;
        $key = "uah";
        if(Cache::has($key)){ $uah = Cache::get($key); }
        else { $uah = $this->getUAH($key); }

        return round($uah,1);
    }

    public function getUAH($key)
    {
        try {
            $content = file_get_contents("https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5");
            $result  = json_decode($content);
            $seconds = 1800;
            $uah = $result[0]->sale;
            Cache::set($key, $uah, $seconds);
            return $uah;
        } catch (Exception $e) {
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
