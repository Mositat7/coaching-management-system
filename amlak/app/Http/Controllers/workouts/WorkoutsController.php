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
        return view('plans.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function assign()
    {
        return view('plans.assign');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function list(){
        return view('plans.list');
    }
    public function library(){
        return view('plans.library');
    }
    public function destroy(string $id)
    {
        //
    }
}
