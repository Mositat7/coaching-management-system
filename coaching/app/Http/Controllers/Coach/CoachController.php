<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoachController extends Controller
{
      public function add()
    {
        return view('coaches.coach-add');
    }
    public function destroy(string $id)
    {
        //
    }
}
