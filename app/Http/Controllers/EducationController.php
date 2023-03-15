<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = Validator::make($request->all(),
        [
            'curricula_id' => 'required|min:3|max:255',
            'university' => 'required|min:3|max:255',
            'level' => 'required|min:3|max:300',
            'feild' => 'required|min:3|max:300',
            'start_date' => 'required',
            'end_date' => 'required',

                     
        ]);

        Education::create([
            'curriculum_id'=>$request->curriculum_id,
            'university'=>$request->university,
            'level'=>$request->level,
            'feild'=>$request->feild,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $validated = Validator::make($request->all(),
        [
            'curricula_id' => 'required|min:3|max:255',
            'university' => 'required|min:3|max:255',
            'level' => 'required|min:3|max:300',
            'feild' => 'required|min:3|max:300',
            'start_date' => 'required',
            'end_date' => 'required',

                     
        ]);

        $education = Education::findorFail($request->id);
 
        $education->university = $request->university;
        $education->level = $request->level;
        $education->feild = $request->feild;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Education::where('id', $request->id)->delete();
    }
}
