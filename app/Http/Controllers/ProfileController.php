<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try {
            // Use the `with` method to eager load the `profile` relationship
            $user = Auth::user()->id;
            $profile = User::with('phone.adress','link.application.category','curriculum.education','curriculum.work','curriculum.skill','curriculum.language','curriculum.contact','curriculum.gallery')
            ->where('id', $user)
            ->get();

            if (! $profile) {
                throw new \Exception('Profile data not found for user');
            }

            return $this->success(TestResource::collection($profile));


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $validated = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:255',
            'numberPhone' => 'required|min:3|max:255',
            'position' => 'required|min:3|max:255',
            'bio' => 'required|min:3|max:255',
            'adress' => 'required|min:3',
            'picture' => 'required|min:3',
                     
        ]);

        $profile = User::findorFail(Auth::user()->id);
 
        $profile->name = $request->name;
        $profile->position = $request->position;
        $profile->bio = $request->bio;
        $profile->adress = $request->adress;
        $profile->picture = $request->picture;
        $profile->save();

        $countPhone = Phone::where('user_id',$profile->id)->count();

        if($countPhone == 0){
        $phone = new Phone([
            'user_id'=> Auth::user()->id,
            'adress_id'=> $request->adress_id,
            'number'=>  $request->numberPhone,
        ]);
        $phone->save();

    }

    if($countPhone != 0){
        $phone = Phone::where('user_id',$profile->id)->update([
            'user_id'=> $profile->id,
            'adress_id'=> $request->adress_id,
            'number'=> $request->numberPhone,
        ]);
    
    }
    return response()->json(['message' => 'Your profile has been updated!'], 200);

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
