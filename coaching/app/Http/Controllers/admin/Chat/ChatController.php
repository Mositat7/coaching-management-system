<?php

namespace App\Http\Controllers\admin\Chat;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ChatController extends Controller
{
    /**
     * نمایش صفحه چت (ارتباط شاگرد با مدیر) - فقط فرانت
     */
    public function index(): View
    {
        return view('admin.chat.index');
    }
}
