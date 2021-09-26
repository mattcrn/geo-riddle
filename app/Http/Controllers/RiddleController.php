<?php

namespace App\Http\Controllers;

use App\Http\Resources\RiddleResource;
use Illuminate\Http\Request;
use App\Models\Riddle;

class RiddleController extends Controller
{
    public function index() {

        $riddles = Riddle::all();

        return view('index', ['riddles' => RiddleResource::collection($riddles)]);
    }
}
