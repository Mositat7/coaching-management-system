<?php

namespace App\Http\Controllers\plans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
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
}
