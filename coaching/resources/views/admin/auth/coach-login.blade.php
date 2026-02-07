<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود مربی - سیستم مدیریت</title>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/vazir/font-face.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --success: #10b981;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --border: #e2e8f0;
            --shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            --radius: 16px;
        }

        body {
            font-family: Vazir, sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            transition: transform 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        .auth-icon i {
            font-size: 32px;
            color: white;
        }

        .auth-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .auth-subtitle {
            color: var(--gray);
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 14px;
        }

        .input-group {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border);
            transition: all 0.3s;
        }

        .input-group:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .input-group-text {
            background: var(--light);
            border: none;
            padding: 0 18px;
            color: var(--gray);
        }

        .form-control {
            border: none;
            padding: 12px 16px;
            font-size: 16px;
            background: transparent;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 14px 18px;
            margin-top: 20px;
            font-size: 14px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: #fee2e2;
            color: #dc2626;
        }

        .auth-footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            text-align: center;
        }

        .footer-text {
            color: var(--gray);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .auth-card {
                padding: 30px 20px;
                margin: 10px;
            }

            .auth-icon {
                width: 70px;
                height: 70px;
            }

            .auth-icon i {
                font-size: 28px;
            }

            .auth-title {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="ri-user-star-line"></i>
            </div>
            <h1 class="auth-title">ورود مربیان</h1>
            <p class="auth-subtitle">شماره موبایل خود را وارد کنید</p>
        </div>

        <form method="POST" action="{{ route('coach.send-otp') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">شماره موبایل</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ri-smartphone-line"></i>
                    </span>
                    <input type="tel"
                           name="mobile"
                           class="form-control"
                           placeholder="۰۹۱۲۳۴۵۶۷۸۹"
                           required
                           pattern="09[0-9]{9}"
                           maxlength="11"
                           dir="ltr">
                </div>
                <small class="text-muted mt-2 d-block">فرمت صحیح: ۰۹۱۲۳۴۵۶۷۸۹</small>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="ri-send-plane-fill"></i>
                <span>دریافت کد تأیید</span>
            </button>

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="ri-error-warning-line me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif
        </form>

        <div class="auth-footer">
            <p class="footer-text">
                <i class="ri-shield-check-line me-1"></i>
                اطلاعات شما نزد ما امن است
            </p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileInput = document.querySelector('input[name="mobile"]');

        // فرمت شماره موبایل هنگام تایپ
        mobileInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');

            if (value.length > 0 && !value.startsWith('0')) {
                value = '0' + value;
            }

            if (value.length > 11) {
                value = value.substring(0, 11);
            }

            this.value = value;
        });
    });
</script>
</body>
</html>
