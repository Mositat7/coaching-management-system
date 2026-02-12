<?php

namespace App\Http\Controllers\admin\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
class OrdersController extends Controller
{
    public function index(): View
{
    // بعداً اینجا از DB لود می‌کنی
    $orders = collect(); // فعلاً خالی، فقط برای این که ویو کار کند

    return view('admin.orders.index', compact('orders'));
}
}
