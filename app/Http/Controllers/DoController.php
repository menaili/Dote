<?php

namespace App\Http\Controllers;
use App\Models\Link;
use Illuminate\Http\Request;

class DoController extends Controller
{
    public function index(Request $request)
    {
        $profile = Link::with('user','application')
        ->where('user_id',1)
        ->get();
        return $profile;
    }
}
