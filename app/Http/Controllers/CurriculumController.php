<?php

namespace App\Http\Controllers;

use App\Http\Resources\CvResource;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;

        $cv = Curriculum::with('education','work','skill','language','contact','gallery')
        ->where('user_id', $user)
        ->get();
       
        return $this->success(CvResource::collection($cv));

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
        $user = Auth::user()->id;
        $validated = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:255',
            'position' => 'required|min:3|max:255',
            'bio' => 'required|min:3|max:300',
            'picture' => 'required|min:3|max:300',
                     
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

            $CV=Curriculum::create([
                'user_id'=>$user,
                'name'=>$request->name,
                'position'=>$request->position,
                'bio'=>$request->bio,
                'picture'=>$request->picture,
            ]);

            return $this->success($CV);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function show(Curriculum $curriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function edit(Curriculum $curriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curriculum $curriculum)
    {
        $validated = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:255',
            'position' => 'required|min:3|max:255',
            'bio' => 'required|min:3|max:300',
            'picture' => 'required|min:3|max:300',
                     
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{


        $CV = Curriculum::findorFail($request->id);
 
        $CV->name = $request->name;
        $CV->position = $request->position;
        $CV->bio = $request->bio;
        $CV->picture = $request->picture;
        $CV->save();
        return $this->success($CV);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Curriculum::where('id', $request->id)->delete();

    }
}
