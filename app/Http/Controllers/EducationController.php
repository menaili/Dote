<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Curriculum;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         try {
            $user = Auth::user()->id;
            $education = Education::where('curriculum_id', $request->curriculum_id)->paginate(3);
            if ($education->isEmpty()) {
                return $this->error(EducationResource::collection($education)->response()->getData(true));

                throw new \Exception('education data not found for user');
            }

            return $this->success(EducationResource::collection($education)->response()->getData(true));


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
            'university' => 'required|min:3|max:255',
            'level' => 'required|min:3|max:300',
            'feild' => 'required|min:3|max:300',
            'start_date' => 'required',
            'end_date' => 'required',

                     
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

        $education= Education::create([
            'curriculum_id'=>$request->curriculum_id,
            'university'=>$request->university,
            'level'=>$request->level,
            'feild'=>$request->feild,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,

        ]);
        return $this->success($education);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
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
        $education_edit=Education::findorFail($education);
        return $education_edit;
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
            
            'university' => 'required|min:3|max:255',
            'level' => 'required|min:3|max:300',
            'feild' => 'required|min:3|max:300',
            'start_date' => 'required',
            'end_date' => 'required',

                     
        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{

        $education = Education::findorFail($request->id);
 
        $education->university = $request->university;
        $education->level = $request->level;
        $education->feild = $request->feild;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->save();
        return $this->success($education);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
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

    public function erroreducation(
        mixed $data,
        int $status = 400,
        bool $success = false,
        string $message = "education data not found ",
    ): JsonResponse
    {
        return Response::json([
            "status"  => $status,
            "success" => $success,
            "message" => $message,
            ...$data,
        ], $status);
    }
}
