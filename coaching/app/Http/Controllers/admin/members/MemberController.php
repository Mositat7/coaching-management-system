<?php

namespace App\Http\Controllers\Admin\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        return view('admin.members.members-add');
    }
    public function details()
    {
        return view('admin.members.members-details');
    }
    public function list(){
        return view('admin.members.members-list');
    }
    public function grid(){
        return view('admin.members.members-grid');
    }
    public function destroy(string $id)
    {
        //
    }
}
