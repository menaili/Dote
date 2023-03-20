<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class WorkController extends Controller
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
            'position' => 'required|min:3|max:255',
            'company' => 'required|min:3|max:300',
            'description' => 'required|min:3|max:300',
            'start_date' => 'required',
            'end_date' => 'required',

                     
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

        $work=Work::create([
            'curriculum_id'=>$request->curriculum_id,
            'position'=>$request->position,
            'company'=>$request->company,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,

        ]);

        return $this->success($work);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $validated = Validator::make($request->all(),
        [
            'curricula_id' => 'required|min:3|max:255',
            'position' => 'required|min:3|max:255',
            'company' => 'required|min:3|max:300',
            'description' => 'required|min:3|max:300',
            'start_date' => 'required',
            'end_date' => 'required',

                     
        ]);
        
        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

        $work = Work::findorFail($request->id);
 
        $work->position = $request->position;
        $work->company = $request->company;
        $work->description = $request->description;
        $work->start_date = $request->start_date;
        $work->end_date = $request->end_date;
        $work->save();
        return $this->success($work);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work, Request $request)
    {
        Work::where('id', $request->id)->delete();
    }
}
