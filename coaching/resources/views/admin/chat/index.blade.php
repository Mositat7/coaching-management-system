@extends('layouts.master')

@section('title', 'چت و پیام‌ها | ارتباط با شاگردان')

@section('head')
<style>
    /* استفاده از متغیرهای بوت‌استرپ برای سازگاری با تم روشن و تاریک */
    .chat-page { height: calc(100vh - 180px); min-height: 420px; }
    .chat-layout { display: flex; height: 100%; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,.08); border: 1px solid var(--bs-border-color); background: var(--bs-secondary-bg); }
    .chat-sidebar { width: 320px; min-width: 280px; border-left: 1px solid var(--bs-border-color); display: flex; flex-direction: column; background: var(--bs-secondary-bg); }
    .chat-sidebar-header { padding: 16px; border-bottom: 1px solid var(--bs-border-color); flex-shrink: 0; }
    .chat-sidebar-header h5 { margin: 0; font-weight: 600; display: flex; align-items: center; gap: 8px; color: var(--bs-body-color); }
    .chat-sidebar-header h5 i { color: var(--bs-primary); }
    .chat-search { padding: 12px 14px; border-radius: 10px; border: 1px solid var(--bs-border-color); background: var(--bs-body-bg); width: 100%; font-size: 0.9rem; color: var(--bs-body-color); }
    .chat-search::placeholder { color: var(--bs-secondary-color); }
    .chat-search:focus { outline: none; border-color: var(--bs-primary); background: var(--bs-secondary-bg); color: var(--bs-body-color); }
    .chat-list { flex: 1; overflow-y: auto; }
    .chat-list-item { display: flex; align-items: center; gap: 12px; padding: 14px 16px; cursor: pointer; transition: background .15s; border-bottom: 1px solid var(--bs-border-color); }
    .chat-list-item:hover { background: var(--bs-body-bg); }
    .chat-list-item.active { background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.1)); }
    .chat-list-avatar { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; flex-shrink: 0; background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.15)); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--bs-primary); font-size: 1.1rem; }
    .chat-list-body { flex: 1; min-width: 0; }
    .chat-list-name { font-weight: 600; font-size: 0.95rem; margin-bottom: 2px; color: var(--bs-body-color); }
    .chat-list-preview { font-size: 0.8rem; color: var(--bs-secondary-color); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .chat-list-meta { flex-shrink: 0; text-align: left; font-size: 0.75rem; color: var(--bs-secondary-color); }
    .chat-list-unread { background: var(--bs-danger); color: #fff; font-size: 0.7rem; padding: 2px 6px; border-radius: 10px; margin-top: 4px; display: inline-block; }
    .chat-main { flex: 1; display: flex; flex-direction: column; min-width: 0; background: var(--bs-body-bg); }
    .chat-main-header { padding: 14px 20px; background: var(--bs-secondary-bg); border-bottom: 1px solid var(--bs-border-color); display: flex; align-items: center; gap: 12px; flex-shrink: 0; }
    .chat-main-back { display: none; width: 36px; height: 36px; align-items: center; justify-content: center; border-radius: 8px; background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.15)); color: var(--bs-primary); cursor: pointer; }
    .chat-main-avatar { width: 42px; height: 42px; border-radius: 50%; object-fit: cover; background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.15)); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--bs-primary); }
    .chat-main-title { flex: 1; min-width: 0; }
    .chat-main-title .name { font-weight: 600; font-size: 1rem; margin: 0; color: var(--bs-body-color); }
    .chat-main-title .status { font-size: 0.8rem; color: var(--bs-success); margin: 0; }
    .chat-messages { flex: 1; overflow-y: auto; padding: 20px; display: flex; flex-direction: column; gap: 12px; background: var(--bs-body-bg); }
    /* مثل تلگرام: پیام فرستنده همیشه راست، پیام طرف مقابل چپ (در RTL) */
    .chat-msg { max-width: 75%; display: flex; gap: 8px; align-items: flex-end; }
    .chat-msg.me { align-self: flex-start; flex-direction: row-reverse; }
    .chat-msg.them { align-self: flex-end; }
    .chat-msg-avatar { width: 32px; height: 32px; border-radius: 50%; flex-shrink: 0; object-fit: cover; background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.15)); font-size: 0.8rem; display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--bs-primary); }
    .chat-msg-bubble { padding: 10px 14px; border-radius: 14px; font-size: 0.9rem; line-height: 1.5; position: relative; color: var(--bs-body-color); }
    .chat-msg.me .chat-msg-bubble { background: var(--bs-primary); color: #fff; border-bottom-left-radius: 4px; }
    .chat-msg.them .chat-msg-bubble { background: var(--bs-secondary-bg); border: 1px solid var(--bs-border-color); color: var(--bs-body-color); border-bottom-right-radius: 4px; }
    .chat-msg-time { font-size: 0.7rem; color: var(--bs-secondary-color); margin-top: 4px; }
    .chat-msg.me .chat-msg-time { text-align: left; color: rgba(255,255,255,.85); }
    .chat-input-wrap { padding: 16px 20px; background: var(--bs-secondary-bg); border-top: 1px solid var(--bs-border-color); flex-shrink: 0; }
    .chat-input-row { display: flex; gap: 10px; align-items: flex-end; }
    .chat-input { flex: 1; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--bs-border-color); font-size: 0.95rem; resize: none; min-height: 46px; max-height: 120px; background: var(--bs-body-bg); color: var(--bs-body-color); }
    .chat-input::placeholder { color: var(--bs-secondary-color); }
    .chat-input:focus { outline: none; border-color: var(--bs-primary); background: var(--bs-body-bg); color: var(--bs-body-color); }
    .chat-send { width: 46px; height: 46px; border-radius: 12px; background: var(--bs-primary); color: #fff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; transition: opacity .2s; }
    .chat-send:hover { opacity: .9; color: #fff; }
    .chat-send:disabled { opacity: .6; cursor: not-allowed; }
    .chat-empty-state { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--bs-secondary-color); padding: 24px; text-align: center; }
    .chat-empty-state i { font-size: 4rem; margin-bottom: 16px; opacity: .5; }
    @media (max-width: 991px) {
        .chat-sidebar { width: 100%; max-width: 100%; }
        .chat-layout { flex-direction: column; }
        .chat-main { display: none; }
        .chat-main.js-open { display: flex !important; }
        .chat-main.js-open .chat-main-back { display: flex; }
        .chat-sidebar.js-hide-list { display: none; }
        .chat-page { height: calc(100vh - 140px); }
    }
</style>
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <div>
                        <h4 class="mb-0 fw-semibold">
                            <i class="ri-message-3-line me-2"></i>
                            چت و پیام‌ها
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active">چت</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="chat-page">
                    <div class="chat-layout">
                        <!-- لیست مکالمات -->
                        <aside class="chat-sidebar" id="chatSidebar">
                            <div class="chat-sidebar-header">
                                <h5><i class="ri-chat-3-line text-primary"></i> مکالمات</h5>
                                <input type="text" class="chat-search mt-3" placeholder="جستجو در مکالمات..." id="chatSearch" />
                            </div>
                            <div class="chat-list" id="chatList">
                                <div class="chat-list-item active" data-chat="1">
                                    <div class="chat-list-avatar">ع</div>
                                    <div class="chat-list-body">
                                        <div class="chat-list-name">علی محمدی</div>
                                        <div class="chat-list-preview">برنامه غذایی این هفته رو می‌تونم عوض کنم؟</div>
                                    </div>
                                    <div class="chat-list-meta">۱۰:۳۲</div>
                                </div>
                                <div class="chat-list-item" data-chat="2">
                                    <div class="chat-list-avatar">س</div>
                                    <div class="chat-list-body">
                                        <div class="chat-list-name">سارا احمدی</div>
                                        <div class="chat-list-preview">ممنون از برنامه تمرینی، خیلی راضیم</div>
                                    </div>
                                    <div class="chat-list-meta">دیروز</div>
                                </div>
                                <div class="chat-list-item" data-chat="3">
                                    <div class="chat-list-avatar">م</div>
                                    <div class="chat-list-body">
                                        <div class="chat-list-name">محمد رضایی</div>
                                        <div class="chat-list-preview">سوالی درباره تعداد ست‌ها داشتم</div>
                                    </div>
                                    <div class="chat-list-meta">۲ روز قبل</div>
                                    <span class="chat-list-unread">۲</span>
                                </div>
                            </div>
                        </aside>

                        <!-- ناحیه چت فعال -->
                        <main class="chat-main" id="chatMain">
                            <div class="chat-main-header">
                                <span class="chat-main-back" id="chatBack" aria-label="بازگشت به لیست"><i class="ri-arrow-right-line"></i></span>
                                <div class="chat-main-avatar">ع</div>
                                <div class="chat-main-title">
                                    <p class="name">علی محمدی</p>
                                    <p class="status"><i class="ri-record-circle-fill me-1"></i> آنلاین</p>
                                </div>
                            </div>
                            <div class="chat-messages" id="chatMessages">
                                <div class="chat-msg them">
                                    <div class="chat-msg-avatar">ع</div>
                                    <div>
                                        <div class="chat-msg-bubble">سلام، می‌خواستم بدونم می‌تونم برنامه غذایی این هفته رو یکم سبک‌تر کنم؟</div>
                                        <div class="chat-msg-time">۹:۱۵</div>
                                    </div>
                                </div>
                                <div class="chat-msg me">
                                    <div class="chat-msg-avatar">م</div>
                                    <div>
                                        <div class="chat-msg-bubble">سلام علی جان. بله حتماً، می‌تونی یک وعده شام رو حذف کنی یا سبک‌تر بخوری.</div>
                                        <div class="chat-msg-time">۹:۲۲</div>
                                    </div>
                                </div>
                                <div class="chat-msg them">
                                    <div class="chat-msg-avatar">ع</div>
                                    <div>
                                        <div class="chat-msg-bubble">ممنون. یه سوال دیگه: پروتئین شیک بعد تمرین ضروریه؟</div>
                                        <div class="chat-msg-time">۹:۴۰</div>
                                    </div>
                                </div>
                                <div class="chat-msg me">
                                    <div class="chat-msg-avatar">م</div>
                                    <div>
                                        <div class="chat-msg-bubble">اگه تا یک ساعت بعد تمرین غذا می‌خوری، لازم نیست. در غیر این صورت یک اسکوپ پروتئین یا یک منبع پروتئین سبک کافیه.</div>
                                        <div class="chat-msg-time">۹:۴۵</div>
                                    </div>
                                </div>
                                <div class="chat-msg them">
                                    <div class="chat-msg-avatar">ع</div>
                                    <div>
                                        <div class="chat-msg-bubble">عالی، ممنون از راهنماییتون.</div>
                                        <div class="chat-msg-time">۱۰:۳۲</div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-input-wrap">
                                <div class="chat-input-row">
                                    <textarea class="chat-input" id="chatInput" placeholder="پیام خود را بنویسید..." rows="1"></textarea>
                                    <button type="button" class="chat-send" id="chatSend" aria-label="ارسال">
                                        <i class="ri-send-plane-fill fs-5"></i>
                                    </button>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function () {
    var sidebar = document.getElementById('chatSidebar');
    var main = document.getElementById('chatMain');
    var list = document.getElementById('chatList');
    var backBtn = document.getElementById('chatBack');
    var input = document.getElementById('chatInput');
    var sendBtn = document.getElementById('chatSend');
    var search = document.getElementById('chatSearch');

    function isMobile() { return window.getComputedStyle(main).flexDirection === 'column' || window.innerWidth <= 991; }

    // کلیک روی یک مکالمه
    list.querySelectorAll('.chat-list-item').forEach(function (item) {
        item.addEventListener('click', function () {
            list.querySelectorAll('.chat-list-item').forEach(function (i) { i.classList.remove('active'); });
            this.classList.add('active');
            if (isMobile()) {
                sidebar.classList.add('js-hide-list');
                main.classList.add('js-open');
            }
        });
    });

    backBtn.addEventListener('click', function () {
        main.classList.remove('js-open');
        sidebar.classList.remove('js-hide-list');
    });

    // ارسال پیام (نمایشی)
    function sendMessage() {
        var text = (input.value || '').trim();
        if (!text) return;
        var time = new Date();
        var timeStr = time.getHours() + ':' + (time.getMinutes() < 10 ? '0' : '') + time.getMinutes();
        var bubble = document.createElement('div');
        bubble.className = 'chat-msg me';
        bubble.innerHTML = '<div class="chat-msg-avatar">م</div><div><div class="chat-msg-bubble">' + text.replace(/</g, '&lt;') + '</div><div class="chat-msg-time">' + timeStr + '</div></div>';
        document.getElementById('chatMessages').appendChild(bubble);
        input.value = '';
        input.style.height = 'auto';
        document.getElementById('chatMessages').scrollTop = document.getElementById('chatMessages').scrollHeight;
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendMessage(); }
    });

    // اتو ریز textarea
    input.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 120) + 'px';
    });
})();
</script>
@endsection
