<?php

namespace App\Http\Controllers\admin\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoachController extends Controller
{
      public function add()
    {
        return view('admin.coaches.coach-add');
    }
    public function destroy(string $id)
    {
        //
    }
}
