<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        return view('customers.customers-add');
    }
    public function details()
    {
        return view('customers.customers-details');
    }
    public function list(){
        return view('customers.customers-list');
    }
    public function grid(){
        return view('customers.customers-grid');
    }
    public function destroy(string $id)
    {
        //
    }
}
