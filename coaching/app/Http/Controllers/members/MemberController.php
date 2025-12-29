<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        return view('members.members-add');
    }
    public function details()
    {
        return view('members.members-details');
    }
    public function list(){
        return view('members.members-list');
    }
    public function grid(){
        return view('members.members-grid');
    }
    public function destroy(string $id)
    {
        //
    }
}
