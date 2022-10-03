<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use Illuminate\Http\Request;

class LogisticController extends Controller
{
    public function index()
    {
        return view('logistic.index');
    }

    public function create()
    {
        return view('logistic.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Logistic $logistic) // lihat surat jalan
    {
        return view('logistic.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function edit(Logistic $logistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logistic $logistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logistic $logistic)
    {
        //
    }
}
