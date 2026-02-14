@extends('layouts.master')

@section('title', 'ورود به پنل شاگرد')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5 text-center">
                        <div class="avatar-lg rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="ri-user-line text-primary fs-1"></i>
                        </div>
                        <h4 class="mb-2">پنل شاگرد</h4>
                        <p class="text-muted mb-4">
                            برای ورود به پنل خود، روی لینکی که مربیت برات فرستاده کلیک کن.<br>
                            اگر لینک نداری، از مربی خود درخواست کن.
                        </p>
                        <a href="{{ route('coach.login') }}" class="btn btn-outline-primary">
                            <i class="ri-arrow-left-line me-1"></i>بازگشت به صفحه اصلی
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
