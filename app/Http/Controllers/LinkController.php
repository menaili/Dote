<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class LinkController extends Controller
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
        $user = Auth::user()->id;
        $validated = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:255',
            'url' => 'required|min:3|max:255',
                     
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{
            $LINK= Link::create([
            'name'=>$request->name,
            'url'=>$request->url,
            'application_id'=>$request->application_id,
            'user_id'=>$user,
        ]);
        return $this->success($LINK);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:255',
            'url' => 'required|min:3|max:255',
                     
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

        $link = Link::findorFail($request->id);
 
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        return $this->success($link);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Link::where('id', $request->id)->delete();
    }
}
