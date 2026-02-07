<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأیید کد - سیستم مدیریت</title>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/vazir/font-face.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: #3b82f6;
            --success: #10b981;
            --danger: #ef4444;
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
            background: linear-gradient(135deg, var(--success), #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
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
            margin-bottom: 5px;
        }

        .mobile-number {
            font-weight: 600;
            color: var(--dark);
            font-size: 16px;
            direction: ltr;
            display: inline-block;
        }

        .otp-container {
            margin: 30px 0;
        }

        .otp-label {
            display: block;
            text-align: center;
            color: var(--gray);
            margin-bottom: 15px;
            font-size: 14px;
        }

        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 10px;
            direction: ltr; /* از چپ به راست */
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            border: 2px solid var(--border);
            border-radius: 10px;
            transition: all 0.3s;
            background: var(--light);
            direction: ltr; /* از چپ به راست */
        }

        .otp-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .timer-container {
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            background: var(--light);
            border-radius: 10px;
        }

        .timer-text {
            color: var(--gray);
            font-size: 14px;
        }

        .timer {
            font-weight: 600;
            color: var(--danger);
            font-size: 18px;
            direction: ltr;
            display: inline-block;
            font-family: monospace;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #059669);
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

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 14px 18px;
            margin-bottom: 20px;
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

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #dc2626;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            margin-top: 20px;
            transition: all 0.3s;
        }

        .back-link:hover {
            color: var(--primary-dark);
            transform: translateX(-5px);
        }

        .auth-footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            text-align: center;
        }

        .footer-text {
            color: var(--gray);
            font-size: 13px;
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

            .otp-input {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }

            .otp-inputs {
                gap: 10px;
            }
        }
    </style>
</head>
<body>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="ri-shield-keyhole-line"></i>
            </div>
            <h1 class="auth-title">تأیید هویت</h1>
            <p class="auth-subtitle">کد ۶ رقمی ارسال شده به شماره</p>
            <div class="mobile-number">{{ $masked ?? '۰۹۱۲*******' }}</div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="ri-check-line me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="ri-close-line me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('debug_otp'))
            <div class="alert alert-success" style="background: #d1fae5; color: #065f46;">
                <i class="ri-information-line me-2"></i>
                <strong>کد تست:</strong> {{ session('debug_otp') }}
            </div>
        @endif

        <form method="POST" action="{{ route('coach.verify-otp') }}" id="verifyForm">
            @csrf
            <input type="hidden" name="mobile" value="{{ $mobile ?? session('otp_mobile') }}">
            <input type="hidden" name="otp_code" id="otp_code" required>

            <div class="otp-container">
                <label class="otp-label">کد تأیید ۶ رقمی</label>
                <div class="otp-inputs">
                    @for($i = 1; $i <= 6; $i++)
                        <input type="text"
                               name="otp[]"
                               class="otp-input"
                               maxlength="1"
                               required
                               autocomplete="off"
                               inputmode="numeric"
                               pattern="[0-9]"
                               data-index="{{ $i - 1 }}"
                               dir="ltr">
                    @endfor
                </div>
                @if($errors->has('otp_code'))
                    <div class="alert alert-danger mt-2">
                        <i class="ri-error-warning-line me-2"></i>
                        {{ $errors->first('otp_code') }}
                    </div>
                @endif
            </div>

            <div class="timer-container">
                <p class="timer-text">
                    <i class="ri-time-line me-1"></i>
                    زمان باقی‌مانده:
                    <span class="timer" id="timer">۰۲:۰۰</span>
                </p>
            </div>

            <button type="submit" class="btn btn-success" id="submitBtn">
                <i class="ri-check-line"></i>
                <span>تأیید و ورود</span>
            </button>

            <div class="text-center">
                <a href="{{ route('coach.login') }}" class="back-link">
                    <i class="ri-arrow-right-line me-1"></i>
                    ویرایش شماره موبایل
                </a>
            </div>
        </form>

        <div class="auth-footer">
            <p class="footer-text">
                کد تأیید تا ۲ دقیقه اعتبار دارد
            </p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const otpInputs = document.querySelectorAll('.otp-input');
        const otpCodeInput = document.getElementById('otp_code');
        const timerElement = document.getElementById('timer');
        let isSubmitting = false; // تعریف متغیر برای جلوگیری از ارسال مجدد

        // مدیریت OTP Inputs
        otpInputs.forEach((input, index) => {
            // رویداد input برای ورود خودکار به فیلد بعدی
            input.addEventListener('input', function(e) {
                // فقط اعداد
                let value = this.value.replace(/\D/g, '');
                
                // اگر بیشتر از یک رقم وارد شد، فقط اولی را نگه دار
                if (value.length > 1) {
                    value = value.charAt(0);
                }
                
                this.value = value;

                // اگر عددی وارد شد، خودکار به فیلد بعدی برو
                if (value.length === 1 && index < 5) {
                    // استفاده از setTimeout برای اطمینان از اینکه مقدار قبلاً تنظیم شده
                    setTimeout(() => {
                        otpInputs[index + 1].focus();
                        otpInputs[index + 1].select(); // انتخاب محتوا برای جایگزینی آسان
                    }, 10);
                }

                // اگر آخرین فیلد پر شد، فرم را submit کن
                if (value.length === 1 && index === 5) {
                    updateOtpCode();
                    const code = otpCodeInput.value;
                    if (code.length === 6) {
                        // خودکار submit بعد از 300ms
                        setTimeout(() => {
                            if (!isSubmitting) {
                                document.getElementById('verifyForm').requestSubmit();
                            }
                        }, 300);
                    }
                }

                updateOtpCode();
            });

            // رویداد keydown برای مدیریت کلیدها
            input.addEventListener('keydown', function(e) {
                // اگر عددی زده شد و فیلد قبلاً پر بود، محتوا را پاک کن و عدد جدید را بگذار
                if (/\d/.test(e.key) && this.value !== '') {
                    this.value = '';
                }

                // پاک کردن و رفتن به عقب
                if (e.key === 'Backspace') {
                    if (this.value === '' && index > 0) {
                        otpInputs[index - 1].focus();
                        otpInputs[index - 1].select();
                    } else if (this.value !== '') {
                        this.value = '';
                        updateOtpCode();
                    }
                }

                // حرکت با کلیدهای جهت‌دار
                if (e.key === 'ArrowLeft' && index > 0) {
                    e.preventDefault();
                    otpInputs[index - 1].focus();
                    otpInputs[index - 1].select();
                }
                if (e.key === 'ArrowRight' && index < 5) {
                    e.preventDefault();
                    otpInputs[index + 1].focus();
                    otpInputs[index + 1].select();
                }

                // اگر Delete زده شد
                if (e.key === 'Delete' && this.value !== '') {
                    this.value = '';
                    updateOtpCode();
                }
            });

            // رویداد focus برای انتخاب محتوا
            input.addEventListener('focus', function() {
                this.select();
            });

            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text');
                const numbers = pastedData.replace(/\D/g, '').split('');

                numbers.forEach((num, i) => {
                    if (otpInputs[i]) {
                        otpInputs[i].value = num;
                    }
                });

                updateOtpCode();

                // فوکوس روی آخرین اینپوت پر شده
                const lastIndex = Math.min(numbers.length, otpInputs.length) - 1;
                otpInputs[lastIndex].focus();
            });
        });

        function updateOtpCode() {
            let code = '';
            otpInputs.forEach(input => {
                code += input.value || '';
            });
            otpCodeInput.value = code;
            
            // فعال/غیرفعال کردن دکمه بر اساس کامل بودن کد
            const submitBtn = document.getElementById('submitBtn');
            if (code.length === 6) {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
            } else {
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.6';
            }
        }

        // غیرفعال کردن دکمه در ابتدا
        document.getElementById('submitBtn').disabled = true;
        document.getElementById('submitBtn').style.opacity = '0.6';

        // جلوگیری از ارسال مجدد فرم
        document.getElementById('verifyForm').addEventListener('submit', function(e) {
            const code = otpCodeInput.value;
            
            if (code.length !== 6) {
                e.preventDefault();
                alert('لطفاً کد ۶ رقمی را کامل وارد کنید.');
                return false;
            }

            if (isSubmitting) {
                e.preventDefault();
                return false;
            }

            isSubmitting = true;
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="ri-loader-4-line ri-spin"></i> <span>در حال بررسی...</span>';
        });

        // تایمر
        let timeLeft = 120; // 2 دقیقه
        const countdown = setInterval(() => {
            timeLeft--;

            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;

            // تبدیل اعداد فارسی
            const persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            const formatTime = (num) => {
                return num.toString().padStart(2, '0').split('')
                    .map(d => persianNumbers[parseInt(d)]).join('');
            };

            timerElement.textContent = `${formatTime(minutes)}:${formatTime(seconds)}`;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerElement.textContent = '۰۰:۰۰';
                timerElement.style.color = '#dc2626';
                // غیرفعال کردن فرم بعد از انقضا
                document.getElementById('verifyForm').style.opacity = '0.6';
                document.getElementById('submitBtn').disabled = true;
            }
        }, 1000);
    });
</script>
</body>
</html>
