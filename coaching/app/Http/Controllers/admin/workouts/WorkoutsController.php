<?php

namespace App\Http\Controllers\Admin\workouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        return view('admin.plans.workout.create');
    }
    public function edit()
    {
        return view('admin.plans.workout.edit');
    }
    public function show()
    {
        return view('admin.plans.workout.show');
    }
    public function destroy(string $id)
    {
        //
    }
}
