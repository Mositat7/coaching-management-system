<?php

namespace App\Http\Controllers\Admin\plans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function assign()
    {
        return view('admin.plans.assign');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function list(){
        return view('admin.plans.list');
    }
    public function library(){
        return view('admin.plans.library');
    }
}
