<?php

namespace App\Http\Controllers\workouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        return view('plans.workout.create');
    }
    public function edit()
    {
        return view('plans.workout.edit');
    }
    public function show()
    {
        return view('plans.workout.show');
    }
    public function destroy(string $id)
    {
        //
    }
}
