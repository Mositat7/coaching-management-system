@extends('layouts.master')

@section('title', 'چت و پیام‌ها | ارتباط با شاگردان')

@section('head')
<style>
    /* Chat: professional UI/UX + responsive (Bootstrap vars for light/dark) */
    .chat-page { height: calc(100vh - 180px); min-height: 380px; padding: 0; }
    .chat-layout { display: flex; height: 100%; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,.08); border: 1px solid var(--bs-border-color); background: var(--bs-secondary-bg); }
    .chat-sidebar { width: 320px; min-width: 260px; border-left: 1px solid var(--bs-border-color); display: flex; flex-direction: column; background: var(--bs-secondary-bg); }
    .chat-sidebar-header { padding: 18px 16px; border-bottom: 1px solid var(--bs-border-color); flex-shrink: 0; }
    .chat-sidebar-header h5 { margin: 0; font-weight: 600; font-size: 1.05rem; display: flex; align-items: center; gap: 10px; color: var(--bs-body-color); }
    .chat-sidebar-header h5 i { color: var(--bs-primary); font-size: 1.25rem; }
    .chat-search { padding: 12px 14px; border-radius: 12px; border: 1px solid var(--bs-border-color); background: var(--bs-body-bg); width: 100%; font-size: 0.9rem; color: var(--bs-body-color); transition: border-color .2s, box-shadow .2s; }
    .chat-search::placeholder { color: var(--bs-secondary-color); }
    .chat-search:focus { outline: none; border-color: var(--bs-primary); box-shadow: 0 0 0 3px rgba(var(--bs-primary-rgb), 0.15); }
    .chat-list { flex: 1; overflow-y: auto; overflow-x: hidden; -webkit-overflow-scrolling: touch; }
    .chat-list::-webkit-scrollbar { width: 6px; }
    .chat-list::-webkit-scrollbar-thumb { background: var(--bs-border-color); border-radius: 3px; }
    .chat-list-item { display: flex; align-items: center; gap: 14px; padding: 14px 16px; cursor: pointer; transition: background .2s ease; border-bottom: 1px solid var(--bs-border-color); min-height: 72px; }
    .chat-list-item:hover { background: var(--bs-body-bg); }
    .chat-list-item.active { background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.12)); border-right: 3px solid var(--bs-primary); }
    .chat-list-avatar { width: 48px; height: 48px; border-radius: 14px; flex-shrink: 0; background: linear-gradient(135deg, var(--bs-primary), var(--bs-secondary)); display: flex; align-items: center; justify-content: center; font-weight: 700; color: #fff; font-size: 1.1rem; }
    .chat-list-body { flex: 1; min-width: 0; }
    .chat-list-name { font-weight: 600; font-size: 0.95rem; margin-bottom: 4px; color: var(--bs-body-color); }
    .chat-list-preview { font-size: 0.8rem; color: var(--bs-secondary-color); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .chat-list-meta { flex-shrink: 0; text-align: left; font-size: 0.75rem; color: var(--bs-secondary-color); }
    .chat-list-unread { background: var(--bs-danger); color: #fff; font-size: 0.7rem; font-weight: 600; min-width: 20px; height: 20px; padding: 0 6px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; }
    .chat-main { flex: 1; display: flex; flex-direction: column; min-width: 0; background: var(--bs-body-bg); }
    .chat-main-header { padding: 16px 20px; background: var(--bs-secondary-bg); border-bottom: 1px solid var(--bs-border-color); display: flex; align-items: center; gap: 14px; flex-shrink: 0; }
    .chat-main-back { display: none; width: 44px; height: 44px; align-items: center; justify-content: center; border-radius: 12px; background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.15)); color: var(--bs-primary); cursor: pointer; transition: background .2s; border: none; }
    .chat-main-back:hover { background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.25)); }
    .chat-main-avatar { width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0; background: linear-gradient(135deg, var(--bs-primary), var(--bs-secondary)); display: flex; align-items: center; justify-content: center; font-weight: 700; color: #fff; font-size: 1.1rem; }
    .chat-main-title { flex: 1; min-width: 0; }
    .chat-main-title .name { font-weight: 600; font-size: 1.05rem; margin: 0; color: var(--bs-body-color); }
    .chat-main-title .status { font-size: 0.8rem; color: var(--bs-success); margin: 2px 0 0; }
    .chat-messages { flex: 1; overflow-y: auto; overflow-x: hidden; padding: 24px 20px; display: flex; flex-direction: column; gap: 14px; background: var(--bs-body-bg); -webkit-overflow-scrolling: touch; scroll-behavior: smooth; }
    .chat-messages::-webkit-scrollbar { width: 6px; }
    .chat-messages::-webkit-scrollbar-thumb { background: var(--bs-border-color); border-radius: 3px; }
    .chat-msg { max-width: 85%; display: flex; gap: 10px; align-items: flex-end; animation: chatMsgIn .25s ease; }
    @keyframes chatMsgIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    .chat-msg.me { align-self: flex-start; flex-direction: row-reverse; }
    .chat-msg.them { align-self: flex-end; }
    .chat-msg-avatar { width: 34px; height: 34px; border-radius: 10px; flex-shrink: 0; background: var(--bs-primary-bg-subtle, rgba(var(--bs-primary-rgb), 0.2)); font-size: 0.85rem; display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--bs-primary); }
    .chat-msg-bubble-wrap { display: flex; align-items: flex-end; gap: 6px; flex-wrap: nowrap; }
    .chat-msg-bubble { padding: 12px 16px; border-radius: 16px; font-size: 0.95rem; line-height: 1.55; position: relative; color: var(--bs-body-color); box-shadow: 0 1px 2px rgba(0,0,0,.06); }
    .chat-msg.me .chat-msg-bubble { background: var(--bs-primary); color: #fff; border-bottom-left-radius: 6px; box-shadow: 0 2px 8px rgba(var(--bs-primary-rgb), 0.35); }
    .chat-msg.them .chat-msg-bubble { background: var(--bs-secondary-bg); border: 1px solid var(--bs-border-color); color: var(--bs-body-color); border-bottom-right-radius: 6px; }
    .chat-msg-meta { margin-top: 6px; display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
    .chat-msg-time { font-size: 0.75rem; color: var(--bs-secondary-color); min-height: 1.2em; }
    .chat-msg.me .chat-msg-time { color: rgba(255,255,255,.9); }
    .chat-msg-ticks { display: inline-flex; align-items: center; color: rgba(255,255,255,.9); font-size: 0.95rem; margin-right: 2px; }
    .chat-msg-ticks.sent { opacity: .85; }
    .chat-msg-ticks.seen { color: #6ab2f2; }
    .chat-msg-edited { font-size: 0.65rem; color: rgba(255,255,255,.7); margin-top: 2px; font-style: italic; width: 100%; }
    .chat-msg-more-wrap { position: relative; flex-shrink: 0; }
    .chat-msg-more { width: 28px; height: 28px; border: none; background: transparent; color: rgba(255,255,255,.75); cursor: pointer; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; padding: 0; font-size: 1.15rem; transition: background .2s; }
    .chat-msg-more:hover { background: rgba(255,255,255,.15); color: #fff; }
    .chat-msg-dropdown { position: absolute; bottom: 100%; right: 0; margin-bottom: 6px; background: var(--bs-body-bg); border: 1px solid var(--bs-border-color); border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.12); padding: 6px; min-width: 110px; z-index: 50; display: none; }
    .chat-msg-dropdown.show { display: block; animation: dropdownIn .2s ease; }
    @keyframes dropdownIn { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } }
    .chat-msg-dropdown button { width: 100%; display: flex; align-items: center; gap: 10px; padding: 10px 14px; border: none; background: none; cursor: pointer; border-radius: 8px; font-size: 0.9rem; color: var(--bs-body-color); text-align: right; transition: background .15s; }
    .chat-msg-dropdown button:hover { background: var(--bs-secondary-bg); }
    .chat-msg-dropdown button i { font-size: 1.05rem; opacity: .9; }
    .chat-input-wrap { padding: 16px 20px; background: var(--bs-secondary-bg); border-top: 1px solid var(--bs-border-color); flex-shrink: 0; }
    .chat-input-row { display: flex; gap: 12px; align-items: flex-end; }
    .chat-input { flex: 1; padding: 14px 18px; border-radius: 14px; border: 1px solid var(--bs-border-color); font-size: 0.95rem; resize: none; min-height: 48px; max-height: 120px; background: var(--bs-body-bg); color: var(--bs-body-color); transition: border-color .2s, box-shadow .2s; }
    .chat-input::placeholder { color: var(--bs-secondary-color); }
    .chat-input:focus { outline: none; border-color: var(--bs-primary); box-shadow: 0 0 0 3px rgba(var(--bs-primary-rgb), 0.12); }
    .chat-send { width: 48px; height: 48px; border-radius: 14px; background: var(--bs-primary); color: #fff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; transition: transform .15s, opacity .2s; }
    .chat-send:hover { opacity: .95; transform: scale(1.02); }
    .chat-send:active { transform: scale(0.98); }
    .chat-send:disabled { opacity: .6; cursor: not-allowed; transform: none; }
    .chat-empty-state { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--bs-secondary-color); padding: 32px 24px; text-align: center; }
    .chat-empty-state i { font-size: 4.5rem; margin-bottom: 20px; opacity: .4; }
    .chat-empty-state p { font-size: 0.95rem; max-width: 280px; line-height: 1.6; }
    .chat-date-sep { text-align: center; margin: 20px 0 10px; }
    .chat-date-sep span { font-size: 0.75rem; font-weight: 500; color: var(--bs-secondary-color); background: var(--bs-secondary-bg); padding: 6px 14px; border-radius: 20px; border: 1px solid var(--bs-border-color); }
    .chat-sticker-bar { padding: 10px 0; border-bottom: 1px solid var(--bs-border-color); display: flex; flex-wrap: wrap; gap: 8px; align-items: center; overflow-x: auto; -webkit-overflow-scrolling: touch; }
    .chat-sticker-bar .sticker-btn { width: 40px; height: 40px; min-width: 40px; border: none; background: transparent; border-radius: 10px; font-size: 1.5rem; cursor: pointer; transition: background .2s, transform .1s; display: flex; align-items: center; justify-content: center; }
    .chat-sticker-bar .sticker-btn:hover { background: var(--bs-secondary-bg); transform: scale(1.1); }
    @media (max-width: 991px) {
        .chat-page { height: calc(100vh - 130px); min-height: 320px; }
        .chat-layout { border-radius: 12px; }
        .chat-sidebar { width: 100%; min-width: 0; }
        .chat-layout { flex-direction: column; }
        .chat-main { display: none; }
        .chat-main.js-open { display: flex !important; }
        .chat-main.js-open .chat-main-back { display: flex !important; }
        .chat-sidebar.js-hide-list { display: none; }
        .chat-list-item { min-height: 64px; padding: 12px 14px; }
        .chat-messages { padding: 16px 14px; gap: 12px; }
        .chat-msg { max-width: 88%; }
        .chat-msg-bubble { padding: 11px 14px; font-size: 0.9rem; }
        .chat-input-wrap { padding: 12px 14px; }
        .chat-input { min-height: 44px; padding: 12px 14px; }
        .chat-send { width: 44px; height: 44px; min-width: 44px; min-height: 44px; }
    }
    @media (max-width: 576px) {
        .chat-page { height: calc(100vh - 110px); }
        .chat-sidebar-header { padding: 14px 12px; }
        .chat-main-header { padding: 12px 14px; }
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
                                <div class="chat-sticker-bar" id="chatStickerBar">
                                    <button type="button" class="sticker-btn" data-sticker="👍" title="👍">👍</button>
                                    <button type="button" class="sticker-btn" data-sticker="❤️" title="❤️">❤️</button>
                                    <button type="button" class="sticker-btn" data-sticker="🔥" title="🔥">🔥</button>
                                    <button type="button" class="sticker-btn" data-sticker="💪" title="💪">💪</button>
                                    <button type="button" class="sticker-btn" data-sticker="🙏" title="🙏">🙏</button>
                                    <button type="button" class="sticker-btn" data-sticker="✅" title="✅">✅</button>
                                    <button type="button" class="sticker-btn" data-sticker="😊" title="😊">😊</button>
                                    <button type="button" class="sticker-btn" data-sticker="🎉" title="🎉">🎉</button>
                                </div>
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
    var maxMessageId = 0;
    var pollIntervalId = null;
    var pollIntervalMs = 800;
    var urlMessages = '{{ url("chat/messages") }}';
    var urlSend = '{{ url("chat/send") }}';
    var urlMessageBase = '{{ url("chat/message") }}';
    var csrfToken = '{{ csrf_token() }}';

    function isMobile() { return window.innerWidth <= 991; }

    function escapeHtml(s) { return (s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/\n/g, '<br>'); }

    function renderDateSep(label) {
        var div = document.createElement('div');
        div.className = 'chat-date-sep';
        div.innerHTML = '<span>' + escapeHtml(label || '') + '</span>';
        return div;
    }

    function getTimeLabel(msg) {
        if (msg && msg.created_at) return msg.created_at;
        var d = new Date();
        var h = d.getHours();
        var m = d.getMinutes();
        return (h < 10 ? '0' + h : h) + ':' + (m < 10 ? '0' + m : m);
    }

    function renderMessage(msg) {
        var isMe = !!msg.is_from_coach;
        var letter = isMe ? 'م' : (currentMemberName ? currentMemberName.charAt(0) : '—');
        var timeStr = getTimeLabel(msg);
        var div = document.createElement('div');
        div.className = 'chat-msg ' + (isMe ? 'me' : 'them');
        if (msg.id) div.setAttribute('data-message-id', msg.id);
        var bodyHtml = (msg.body || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\n/g, '<br>');
        var ticksHtml = '';
        if (isMe) {
            if (msg.read_at) ticksHtml = '<span class="chat-msg-ticks seen" title="مشاهده شده"><i class="ri-check-double-line"></i></span>';
            else ticksHtml = '<span class="chat-msg-ticks sent" title="ارسال شده"><i class="ri-check-line"></i></span>';
        }
        var editedHtml = (msg.edited_at) ? '<div class="chat-msg-edited">ویرایش شده</div>' : '';
        var moreHtml = '';
        if (isMe && msg.id) {
            moreHtml = '<div class="chat-msg-more-wrap"><button type="button" class="chat-msg-more" title="گزینه‌ها" aria-label="گزینه‌ها"><i class="ri-more-2-fill"></i></button><div class="chat-msg-dropdown"><button type="button" class="chat-msg-dropdown-edit" data-id="' + msg.id + '"><i class="ri-edit-line"></i> ویرایش</button><button type="button" class="chat-msg-dropdown-delete" data-id="' + msg.id + '"><i class="ri-delete-bin-line"></i> حذف</button></div></div>';
        }
        var metaHtml = '<div class="chat-msg-meta"><span class="chat-msg-time">' + escapeHtml(timeStr) + '</span>' + ticksHtml + '</div>';
        var bubbleWrap = '<div class="chat-msg-bubble-wrap"><div class="chat-msg-bubble">' + bodyHtml + '</div>' + (isMe ? moreHtml : '') + '</div>';
        div.innerHTML = '<div class="chat-msg-avatar">' + escapeHtml(letter) + '</div><div>' + bubbleWrap + metaHtml + editedHtml + '</div>';
        if (isMe && msg.id) {
            var wrap = div.querySelector('.chat-msg-more-wrap');
            var moreBtn = div.querySelector('.chat-msg-more');
            var drop = div.querySelector('.chat-msg-dropdown');
            var editBtn = div.querySelector('.chat-msg-dropdown-edit');
            var delBtn = div.querySelector('.chat-msg-dropdown-delete');
            if (moreBtn && drop) {
                moreBtn.addEventListener('click', function(e) { e.stopPropagation(); drop.classList.toggle('show'); });
                drop.addEventListener('click', function(e) { e.stopPropagation(); });
            }
            if (editBtn) editBtn.addEventListener('click', function() { drop.classList.remove('show'); doEditMessage(this.getAttribute('data-id'), div); });
            if (delBtn) delBtn.addEventListener('click', function() { drop.classList.remove('show'); doDeleteMessage(this.getAttribute('data-id'), div); });
        }
        return div;
    }

    function doEditMessage(id, msgEl) {
        var bubble = msgEl.querySelector('.chat-msg-bubble');
        var currentBody = bubble ? (bubble.innerText || bubble.textContent || '') : '';
        var body = prompt('متن جدید پیام:', currentBody);
        if (body === null || body.trim() === '') return;
        fetch(urlMessageBase + '/' + id, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ body: body.trim(), _token: csrfToken })
        }).then(function(r) { return r.json(); }).then(function(data) {
            if (data.message) {
                var bubble = msgEl.querySelector('.chat-msg-bubble');
                if (bubble) bubble.innerHTML = (data.message.body || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\n/g, '<br>');
                var editedZone = msgEl.querySelector('.chat-msg-edited');
                if (!editedZone && data.message.edited_at) {
                    var wrap = msgEl.querySelector('.chat-msg-bubble').parentNode;
                    var ed = document.createElement('div'); ed.className = 'chat-msg-edited'; ed.textContent = 'ویرایش شده';
                    wrap.appendChild(ed);
                }
            }
        }).catch(function() { alert('خطا در ویرایش'); });
    }

    function doDeleteMessage(id, msgEl) {
        if (!confirm('این پیام حذف شود؟')) return;
        fetch(urlMessageBase + '/' + id, {
            method: 'DELETE',
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': csrfToken }
        }).then(function(r) { return r.json(); }).then(function(data) {
            if (data.success && msgEl && msgEl.parentNode) msgEl.remove();
        }).catch(function() { alert('خطا در حذف'); });
    }

    function renderMessagesGrouped(messages) {
        if (!messages || messages.length === 0) return;
        var lastDate = null;
        messages.forEach(function (msg) {
            var date = msg.created_date || '';
            var label = msg.date_label || date;
            if (date && date !== lastDate) {
                var sep = renderDateSep(label);
                sep.setAttribute('data-date', date);
                chatMessages.appendChild(sep);
                lastDate = date;
            }
            chatMessages.appendChild(renderMessage(msg));
        });
    }

    function appendNewMessage(msg, dateLabel) {
        var lastSep = chatMessages.querySelector('.chat-date-sep:last-child');
        var lastDate = lastSep ? (lastSep.getAttribute('data-date') || '') : '';
        var msgDate = msg.created_date || '';
        if (msgDate && msgDate !== lastDate) {
            var sep = renderDateSep(dateLabel || msg.date_label || msgDate);
            sep.setAttribute('data-date', msgDate);
            chatMessages.appendChild(sep);
        }
        chatMessages.appendChild(renderMessage(msg));
    }

    function stopPolling() {
        if (pollIntervalId) {
            clearInterval(pollIntervalId);
            pollIntervalId = null;
        }
    }

    function startPolling() {
        stopPolling();
        if (!currentMemberId) return;
        pollIntervalId = setInterval(pollForNewMessages, pollIntervalMs);
    }

    function updateTicksToSeen(messageId) {
        var el = chatMessages.querySelector('.chat-msg[data-message-id="' + messageId + '"]');
        if (!el) return;
        var ticks = el.querySelector('.chat-msg-ticks');
        if (ticks && !ticks.classList.contains('seen')) {
            ticks.className = 'chat-msg-ticks seen';
            ticks.title = 'مشاهده شده';
            ticks.innerHTML = '<i class="ri-check-double-line"></i>';
        }
    }

    function pollForNewMessages() {
        if (!currentMemberId) return;
        fetch(urlMessages + '/' + currentMemberId, { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                var messages = data.messages || [];
                var newOnes = messages.filter(function (m) { return m.id > maxMessageId; });
                var fromMember = newOnes.some(function (m) { return !m.is_from_coach; });
                newOnes.forEach(function (msg) {
                    appendNewMessage(msg, msg.date_label);
                    if (msg.id > maxMessageId) maxMessageId = msg.id;
                });
                messages.forEach(function (m) {
                    if (m.is_from_coach && m.read_at) updateTicksToSeen(m.id);
                });
                if (newOnes.length > 0) {
                    if (!document.hidden) chatMessages.scrollTop = chatMessages.scrollHeight;
                    if (fromMember) {
                        if (typeof window.playNotificationSound === 'function') window.playNotificationSound();
                        if (document.hidden) {
                            window._chatUnread = (window._chatUnread || 0) + newOnes.filter(function (m) { return !m.is_from_coach; }).length;
                            if (typeof window.setTitleNotification === 'function') window.setTitleNotification(window._chatUnread);
                            if (typeof window.showNotificationToast === 'function') window.showNotificationToast('پیام جدید', currentMemberName || 'شاگرد');
                        }
                    }
                }
            })
            .catch(function () {});
    }

    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) {
            window._chatUnread = 0;
            if (typeof window.clearTitleNotification === 'function') window.clearTitleNotification();
        }
    });

    function loadMessages(memberId, memberName) {
        stopPolling();
        currentMemberId = memberId;
        currentMemberName = memberName || '';
        maxMessageId = 0;
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
                if (data.member && data.member.full_name) {
                    currentMemberName = data.member.full_name;
                    chatMainName.textContent = data.member.full_name;
                    chatMainAvatar.textContent = data.member.full_name.charAt(0);
                }
                chatMessages.innerHTML = '';
                var messages = data.messages || [];
                renderMessagesGrouped(messages);
                messages.forEach(function (m) { if (m.id > maxMessageId) maxMessageId = m.id; });
                chatMessages.scrollTop = chatMessages.scrollHeight;
                startPolling();
            })
            .catch(function () {
                chatMessages.innerHTML = '<div class="chat-empty-state"><p class="mb-0 text-danger">خطا در بارگذاری پیام‌ها</p></div>';
            });
    }

    document.querySelectorAll('#chatStickerBar .sticker-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var sticker = this.getAttribute('data-sticker') || '';
            if (sticker && input) input.value = (input.value || '') + sticker;
        });
    });

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

    (function openMemberFromUrl() {
        var params = new URLSearchParams(window.location.search);
        var memberId = params.get('member');
        if (!memberId) return;
        var item = list.querySelector('.chat-list-item[data-member-id="' + memberId + '"]');
        if (item) {
            item.click();
        } else {
            loadMessages(memberId, '');
            main.classList.add('js-open');
            if (isMobile()) sidebar.classList.add('js-hide-list');
        }
    })();

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
                    appendNewMessage(data.message, data.message.date_label);
                    if (data.message.id > maxMessageId) maxMessageId = data.message.id;
                    input.value = '';
                    input.style.height = 'auto';
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            })
            .catch(function () { alert('خطا در ارسال پیام'); });
    }

    document.addEventListener('visibilitychange', function () {
        if (document.hidden) stopPolling();
        else if (currentMemberId) startPolling();
    });

    document.addEventListener('click', function () {
        chatMessages.querySelectorAll('.chat-msg-dropdown.show').forEach(function (d) { d.classList.remove('show'); });
    });

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
