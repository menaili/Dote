<?php

namespace App\Http\Controllers;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TestResource;


class DoController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Use the `with` method to eager load the `profile` relationship
            $profile = User::with('phone.adress','link.application.category','curriculum')
            ->where('id', $request->id)
            ->get();

            if ($profile->isEmpty()) {
                return $this->error(TestResource::collection($profile));
                throw new \Exception('Profile data not found for user');
            }
            else{
                return $this->success(TestResource::collection($profile));
            }
            
       
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }


    public function test(Request $request)
    {
        return response()->json([
            'stuff' => phpinfo()
           ]);
    }
}