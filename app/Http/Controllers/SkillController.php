<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class SkillController extends Controller
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
            'name' => 'required|max:255',
            
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

        $skill=Skill::create([
            'curriculum_id'=>$request->curriculum_id,
            'name'=>$request->name,
            
        ]);
        return $this->success($skill);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = Validator::make($request->all(),
        [
            'curricula_id' => 'required|min:3|max:255',
            'name' => 'required|max:255',
            
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

        $skill = Skill::findorFail($request->id);
        $skill->name = $request->name;
        $skill->save();

        return $this->success($skill);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill, Request $request)
    {
        Skill::where('id', $request->id)->delete();
    }
}
