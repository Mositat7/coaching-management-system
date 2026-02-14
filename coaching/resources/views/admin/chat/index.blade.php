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
                                @if($membersForNew->isNotEmpty())
                                <select class="form-select form-select-sm mt-2" id="chatStartNew" style="font-size: 0.9rem;">
                                    <option value="">شروع چت با عضو...</option>
                                    @foreach($membersForNew as $m)
                                    <option value="{{ $m->id }}" data-name="{{ $m->full_name }}">{{ $m->full_name }}</option>
                                    @endforeach
                                </select>
                                @endif
                                <input type="text" class="chat-search mt-3" placeholder="جستجو در مکالمات..." id="chatSearch" />
                            </div>
                            <div class="chat-list" id="chatList">
                                @forelse($conversations as $conv)
                                <div class="chat-list-item" data-member-id="{{ $conv->member->id }}" data-member-name="{{ $conv->member->full_name }}">
                                    <div class="chat-list-avatar">{{ mb_substr($conv->member->full_name, 0, 1) }}</div>
                                    <div class="chat-list-body">
                                        <div class="chat-list-name">{{ $conv->member->full_name }}</div>
                                        <div class="chat-list-preview">{{ Str::limit($conv->last_message->body, 35) }}</div>
                                    </div>
                                    <div class="chat-list-meta">{{ $conv->last_message->created_at->diffForHumans(null, true, true) }}</div>
                                    @if($conv->unread_count > 0)
                                    <span class="chat-list-unread">{{ $conv->unread_count }}</span>
                                    @endif
                                </div>
                                @empty
                                <div class="p-3 text-center text-muted small">هنوز مکالمه‌ای ندارید. با انتخاب یک عضو از لیست اعضا می‌توانید چت را شروع کنید.</div>
                                @endforelse
                            </div>
                        </aside>

                        <!-- ناحیه چت فعال -->
                        <main class="chat-main" id="chatMain">
                            <div class="chat-main-header" id="chatMainHeader">
                                <span class="chat-main-back" id="chatBack" aria-label="بازگشت به لیست"><i class="ri-arrow-right-line"></i></span>
                                <div class="chat-main-avatar" id="chatMainAvatar">—</div>
                                <div class="chat-main-title">
                                    <p class="name" id="chatMainName">یک مکالمه انتخاب کنید</p>
                                    <p class="status text-muted small" id="chatMainStatus">برای مشاهده پیام‌ها روی یک مکالمه کلیک کنید</p>
                                </div>
                            </div>
                            <div class="chat-messages" id="chatMessages">
                                <div class="chat-empty-state" id="chatEmptyState">
                                    <i class="ri-chat-3-line"></i>
                                    <p class="mb-0">مکالمه‌ای انتخاب نشده است</p>
                                </div>
                            </div>
                            <div class="chat-input-wrap" id="chatInputWrap" style="display: none;">
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
    var chatMessages = document.getElementById('chatMessages');
    var chatEmptyState = document.getElementById('chatEmptyState');
    var chatInputWrap = document.getElementById('chatInputWrap');
    var chatMainName = document.getElementById('chatMainName');
    var chatMainAvatar = document.getElementById('chatMainAvatar');
    var chatMainStatus = document.getElementById('chatMainStatus');

    var currentMemberId = null;
    var currentMemberName = '';
    var urlMessages = '{{ url("chat/messages") }}';
    var urlSend = '{{ url("chat/send") }}';
    var csrfToken = '{{ csrf_token() }}';

    function isMobile() { return window.innerWidth <= 991; }

    function escapeHtml(s) { return (s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;'); }

    function renderMessage(msg) {
        var isMe = !!msg.is_from_coach;
        var letter = isMe ? 'م' : (currentMemberName ? currentMemberName.charAt(0) : '—');
        var div = document.createElement('div');
        div.className = 'chat-msg ' + (isMe ? 'me' : 'them');
        div.innerHTML = '<div class="chat-msg-avatar">' + escapeHtml(letter) + '</div><div><div class="chat-msg-bubble">' + escapeHtml(msg.body) + '</div><div class="chat-msg-time">' + escapeHtml(msg.created_at) + '</div></div>';
        return div;
    }

    function loadMessages(memberId, memberName) {
        currentMemberId = memberId;
        currentMemberName = memberName || '';
        chatMainName.textContent = memberName || 'مکالمه';
        chatMainAvatar.textContent = memberName ? memberName.charAt(0) : '—';
        chatMainStatus.innerHTML = '<i class="ri-record-circle-fill me-1"></i> آنلاین';
        chatEmptyState.style.display = 'none';
        chatInputWrap.style.display = 'block';

        chatMessages.innerHTML = '';
        chatMessages.appendChild(chatEmptyState);
        chatEmptyState.style.display = 'none';

        fetch(urlMessages + '/' + memberId, { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                chatMessages.innerHTML = '';
                (data.messages || []).forEach(function (msg) {
                    chatMessages.appendChild(renderMessage(msg));
                });
                chatMessages.scrollTop = chatMessages.scrollHeight;
            })
            .catch(function () {
                chatMessages.innerHTML = '<div class="chat-empty-state"><p class="mb-0 text-danger">خطا در بارگذاری پیام‌ها</p></div>';
            });
    }

    var startNewEl = document.getElementById('chatStartNew');
    if (startNewEl) {
        startNewEl.addEventListener('change', function () {
            var opt = this.options[this.selectedIndex];
            if (opt && opt.value) {
                loadMessages(opt.value, opt.getAttribute('data-name') || opt.textContent);
                this.selectedIndex = 0;
                if (isMobile()) {
                    sidebar.classList.add('js-hide-list');
                    main.classList.add('js-open');
                }
            }
        });
    }

    list.querySelectorAll('.chat-list-item[data-member-id]').forEach(function (item) {
        item.addEventListener('click', function () {
            list.querySelectorAll('.chat-list-item').forEach(function (i) { i.classList.remove('active'); });
            this.classList.add('active');
            var id = this.getAttribute('data-member-id');
            var name = this.getAttribute('data-member-name');
            loadMessages(id, name);
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

    function sendMessage() {
        var text = (input.value || '').trim();
        if (!text || !currentMemberId) return;
        var body = new FormData();
        body.append('member_id', currentMemberId);
        body.append('body', text);
        body.append('_token', csrfToken);

        fetch(urlSend, {
            method: 'POST',
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': csrfToken },
            body: body
        })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.message) {
                    chatMessages.appendChild(renderMessage(data.message));
                    input.value = '';
                    input.style.height = 'auto';
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            })
            .catch(function () { alert('خطا در ارسال پیام'); });
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendMessage(); }
    });

    input.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 120) + 'px';
    });
})();
</script>
@endsection
