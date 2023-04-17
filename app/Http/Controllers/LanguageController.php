<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         try {
            $language = Language::where('curriculum_id', $request->curriculum_id)->paginate(3);
            if ($language->isEmpty()) {
                return $this->erroreducation(ContactResource::collection($language)->response()->getData(true));

                throw new \Exception('education data not found for user');
            }

            return $this->success(ContactResource::collection($language)->response()->getData(true));


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
        $validated = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:255',
            'level' => 'required|min:1|max:255',
        ]);


        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{
        $language= Language::create([
            'curriculum_id'=>$request->curriculum_id,
            'name'=>$request->name,
            'level'=>$request->level,

        ]);

        if ($language->wasRecentlyCreated) {

            return $this->success($language);
        
        } else {
            
            return response()->json(['error' => 'Failed to create language'], 500);
        }
        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        $lang=Language::findorFail($language);
        return $lang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $validated = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:255',
            'level' => 'required|min:1|max:255',
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{
        $language = Language::findorFail($request->id);
        $language->name = $request->name;
        $language->level = $request->level;
        $language->save();
        return $this->success($language);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language, Request $request)
    {
        Language::where('id', $request->id)->delete();
    }
}
