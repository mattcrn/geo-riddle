<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riddle;

class RiddleController extends Controller
{
    public function index() {

        $riddles = Riddle::all();

        return view('index', ['riddles' => $riddles]);
    }
}
