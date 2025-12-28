<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        return view('Property.property-add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details()
    {
        return view('Property.property-details');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function list(){
        return view('Property.property-list');
    }
    public function grid(){
        return view('Property.property-grid');
    }
    public function destroy(string $id)
    {
        //
    }
}
