<?php

namespace App\Http\Controllers;

use App\Models\Freind;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class FreindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try{
        $freinds = Freind::where('user_id',$request->id)->get();
        return $freinds;

        if (! $freinds) {
            throw new \Exception('no freinds yet');
        }

        return $this->success($freinds);


    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return null;
    }
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
     * @param  \App\Models\Freind  $freind
     * @return \Illuminate\Http\Response
     */
    public function show(Freind $freind)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Freind  $freind
     * @return \Illuminate\Http\Response
     */
    public function edit(Freind $freind)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Freind  $freind
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Freind $freind)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Freind  $freind
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freind $freind)
    {
        //
    }
}
