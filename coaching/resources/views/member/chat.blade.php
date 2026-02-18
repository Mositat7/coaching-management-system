@extends('layouts.member', ['member' => $member])

@section('title', 'چت با مربی | پنل شاگرد')

@section('head')
<style>
    /* Member chat: professional UI/UX + responsive (member layout vars) */
    .member-chat-page { height: calc(100vh - 140px); min-height: 380px; display: flex; flex-direction: column; padding: 0; }
    .member-chat-card {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: var(--member-card);
        border: 1px solid var(--member-border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0,0,0,.08);
    }
    .member-chat-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--member-border);
        display: flex;
        align-items: center;
        gap: 14px;
        background: var(--member-card);
        flex-shrink: 0;
    }
    .member-chat-header .back-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        color: var(--member-text-muted);
        text-decoration: none;
        transition: background .2s, color .2s;
        flex-shrink: 0;
    }
    .member-chat-header .back-link:hover { background: var(--member-bg); color: var(--member-primary); }
    .member-chat-header .back-link i { font-size: 1.25rem; }
    .member-chat-header .avatar-wrap {
        width: 44px; height: 44px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--member-primary), var(--member-primary-dark));
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 1.1rem;
    }
    .member-chat-header .title { font-weight: 600; margin: 0; font-size: 1.05rem; color: var(--member-text, inherit); }
    .member-chat-header .sub { font-size: 0.8rem; color: var(--member-text-muted); margin: 2px 0 0; }
    .member-chat-messages {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 24px 20px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        background: var(--member-bg);
        -webkit-overflow-scrolling: touch;
        scroll-behavior: smooth;
    }
    .member-chat-messages::-webkit-scrollbar { width: 6px; }
    .member-chat-messages::-webkit-scrollbar-thumb { background: var(--member-border); border-radius: 3px; }
    .member-chat-msg { max-width: 85%; display: flex; gap: 10px; align-items: flex-end; animation: memberChatMsgIn .25s ease; }
    @keyframes memberChatMsgIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    .member-chat-msg.me { align-self: flex-start; flex-direction: row-reverse; }
    .member-chat-msg.them { align-self: flex-end; }
    .member-chat-bubble-wrap { display: flex; align-items: flex-end; gap: 6px; flex-wrap: nowrap; }
    .member-chat-msg .bubble {
        padding: 12px 16px;
        border-radius: 16px;
        font-size: 0.95rem;
        line-height: 1.55;
        box-shadow: 0 1px 2px rgba(0,0,0,.06);
    }
    .member-chat-msg.me .bubble {
        background: var(--member-primary);
        color: #fff;
        border-bottom-left-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,.15);
    }
    .member-chat-msg.them .bubble {
        background: var(--member-card);
        border: 1px solid var(--member-border);
        color: var(--member-text, inherit);
        border-bottom-right-radius: 6px;
    }
    .member-chat-msg-avatar { width: 34px; height: 34px; border-radius: 10px; flex-shrink: 0; background: var(--member-card); border: 1px solid var(--member-border); font-size: 0.85rem; display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--member-primary); }
    .member-chat-more-wrap { position: relative; flex-shrink: 0; }
    .member-chat-meta { margin-top: 6px; display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
    .member-chat-msg .time { font-size: 0.75rem; opacity: .9; min-height: 1.2em; }
    .member-chat-msg.me .time { color: rgba(255,255,255,.9); }
    .member-chat-msg.them .time { color: var(--member-text-muted); }
    .member-chat-ticks { display: inline-flex; align-items: center; color: rgba(255,255,255,.9); font-size: 0.95rem; margin-right: 2px; }
    .member-chat-ticks.sent { opacity: .85; }
    .member-chat-ticks.seen { color: #6ab2f2; }
    .member-chat-edited { font-size: 0.65rem; color: rgba(255,255,255,.7); margin-top: 2px; font-style: italic; width: 100%; }
    .member-chat-more { width: 28px; height: 28px; border: none; background: transparent; color: rgba(255,255,255,.75); cursor: pointer; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; padding: 0; font-size: 1.15rem; transition: background .2s; }
    .member-chat-more:hover { background: rgba(255,255,255,.15); color: #fff; }
    .member-chat-dropdown { position: absolute; bottom: 100%; right: 0; margin-bottom: 6px; background: var(--member-card); border: 1px solid var(--member-border); border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.12); padding: 6px; min-width: 110px; z-index: 50; display: none; }
    .member-chat-dropdown.show { display: block; animation: memberDropdownIn .2s ease; }
    @keyframes memberDropdownIn { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } }
    .member-chat-dropdown button { width: 100%; display: flex; align-items: center; gap: 10px; padding: 10px 14px; border: none; background: none; cursor: pointer; border-radius: 8px; font-size: 0.9rem; color: var(--member-text); text-align: right; transition: background .15s; }
    .member-chat-dropdown button:hover { background: var(--member-bg); }
    .member-chat-dropdown button i { font-size: 1.05rem; opacity: .9; }
    .member-chat-date-sep { text-align: center; margin: 20px 0 10px; }
    .member-chat-date-sep span { font-size: 0.75rem; font-weight: 500; color: var(--member-text-muted); background: var(--member-card); padding: 6px 14px; border-radius: 20px; border: 1px solid var(--member-border); }
    .member-chat-sticker-bar { padding: 10px 0; border-bottom: 1px solid var(--member-border); display: flex; flex-wrap: wrap; gap: 8px; align-items: center; overflow-x: auto; -webkit-overflow-scrolling: touch; }
    .member-chat-sticker-bar .sticker-btn { width: 40px; height: 40px; min-width: 40px; border: none; background: transparent; border-radius: 10px; font-size: 1.5rem; cursor: pointer; transition: background .2s, transform .1s; display: flex; align-items: center; justify-content: center; }
    .member-chat-sticker-bar .sticker-btn:hover { background: var(--member-bg); transform: scale(1.1); }
    .member-chat-input-wrap { padding: 16px 20px; border-top: 1px solid var(--member-border); background: var(--member-card); flex-shrink: 0; }
    .member-chat-input-row { display: flex; gap: 12px; align-items: flex-end; }
    .member-chat-input {
        flex: 1;
        padding: 14px 18px;
        border-radius: 14px;
        border: 1px solid var(--member-border);
        font-size: 0.95rem;
        resize: none;
        min-height: 48px;
        max-height: 120px;
        background: var(--member-bg);
        color: var(--member-text);
        transition: border-color .2s, box-shadow .2s;
    }
    .member-chat-input::placeholder { color: var(--member-text-muted); }
    .member-chat-input:focus { outline: none; border-color: var(--member-primary); box-shadow: 0 0 0 3px rgba(0,0,0,.1); }
    .member-chat-send { width: 48px; height: 48px; min-width: 48px; min-height: 48px; border-radius: 14px; background: var(--member-primary); color: #fff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; transition: transform .15s, opacity .2s; }
    .member-chat-send:hover { opacity: .95; transform: scale(1.02); }
    .member-chat-send:active { transform: scale(0.98); }
    .member-chat-send:disabled { opacity: .6; cursor: not-allowed; transform: none; }
    .member-chat-empty { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--member-text-muted); padding: 32px 24px; text-align: center; }
    .member-chat-empty i { font-size: 4.5rem; margin-bottom: 20px; opacity: .4; }
    .member-chat-empty p { font-size: 0.95rem; max-width: 280px; line-height: 1.6; margin: 0; }
    @media (max-width: 768px) {
        .member-chat-page { height: calc(100vh - 120px); min-height: 320px; }
        .member-chat-card { border-radius: 12px; }
        .member-chat-header { padding: 14px 16px; }
        .member-chat-messages { padding: 16px 14px; gap: 12px; }
        .member-chat-msg { max-width: 88%; }
        .member-chat-msg .bubble { padding: 11px 14px; font-size: 0.9rem; }
        .member-chat-input-wrap { padding: 12px 14px; }
        .member-chat-input { min-height: 44px; padding: 12px 14px; }
        .member-chat-send { width: 44px; height: 44px; min-width: 44px; min-height: 44px; }
    }
    @media (max-width: 576px) {
        .member-chat-page { height: calc(100vh - 100px); }
        .member-chat-header { padding: 12px 14px; }
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-0">
    <div class="member-chat-page">
        <div class="member-chat-card">
            <div class="member-chat-header">
                <a href="{{ route('dashboard.member') }}" class="back-link" title="بازگشت به داشبورد" aria-label="بازگشت به داشبورد">
                    <i class="ri-arrow-right-line"></i>
                </a>
                <div class="avatar-wrap">
                    {{ $member->coach ? mb_substr($member->coach->full_name, 0, 1) : 'م' }}
                </div>
                <div class="flex-grow-1 min-w-0">
                    <h5 class="title">چت با مربی</h5>
                    <p class="sub">{{ $member->coach?->full_name ?? 'مربی' }}</p>
                </div>
            </div>

            <div class="member-chat-messages" id="chatMessages">
                @php $lastDate = null; @endphp
                @forelse($messages as $m)
                    @if($lastDate !== $m->created_at->format('Y-m-d'))
                        @php $lastDate = $m->created_at->format('Y-m-d'); @endphp
                        <div class="member-chat-date-sep" data-date="{{ $lastDate }}"><span>{{ $m->date_label ?? $lastDate }}</span></div>
                    @endif
                    <div class="member-chat-msg {{ $m->is_from_coach ? 'them' : 'me' }}" data-message-id="{{ $m->id }}">
                        <div>
                            <div class="member-chat-bubble-wrap">
                                <div class="bubble">{{ nl2br(e($m->body)) }}</div>
                                @if(!$m->is_from_coach)
                                    <div class="member-chat-more-wrap">
                                        <button type="button" class="member-chat-more" title="گزینه‌ها"><i class="ri-more-2-fill"></i></button>
                                        <div class="member-chat-dropdown">
                                            <button type="button" class="member-chat-dropdown-edit" data-id="{{ $m->id }}"><i class="ri-edit-line"></i> ویرایش</button>
                                            <button type="button" class="member-chat-dropdown-delete" data-id="{{ $m->id }}"><i class="ri-delete-bin-line"></i> حذف</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="member-chat-meta">
                                <span class="time">{{ $m->created_at->format('H:i') }}</span>
                                @if(!$m->is_from_coach)
                                    @if($m->read_at)
                                        <span class="member-chat-ticks seen" title="مشاهده شده"><i class="ri-check-double-line"></i></span>
                                    @else
                                        <span class="member-chat-ticks sent" title="ارسال شده"><i class="ri-check-line"></i></span>
                                    @endif
                                @endif
                            </div>
                            @if(!$m->is_from_coach && $m->edited_at)<div class="member-chat-edited">ویرایش شده</div>@endif
                        </div>
                    </div>
                @empty
                <div class="member-chat-empty" id="chatEmpty">
                    <i class="ri-chat-3-line"></i>
                    <p>هنوز پیامی رد و بدل نشده. می‌تونی اولین پیام رو بفرستی.</p>
                </div>
                @endforelse
            </div>

            <div class="member-chat-input-wrap">
                <div class="member-chat-sticker-bar" id="chatStickerBar">
                    <button type="button" class="sticker-btn" data-sticker="👍">👍</button>
                    <button type="button" class="sticker-btn" data-sticker="❤️">❤️</button>
                    <button type="button" class="sticker-btn" data-sticker="🔥">🔥</button>
                    <button type="button" class="sticker-btn" data-sticker="💪">💪</button>
                    <button type="button" class="sticker-btn" data-sticker="🙏">🙏</button>
                    <button type="button" class="sticker-btn" data-sticker="✅">✅</button>
                    <button type="button" class="sticker-btn" data-sticker="😊">😊</button>
                    <button type="button" class="sticker-btn" data-sticker="🎉">🎉</button>
                </div>
                <form id="chatSendForm" class="member-chat-input-row">
                    @csrf
                    <textarea name="body" class="member-chat-input" id="chatInput" placeholder="پیامت رو بنویس..." rows="1" required maxlength="2000"></textarea>
                    <button type="submit" class="member-chat-send" id="chatSendBtn" title="ارسال">
                        <i class="ri-send-plane-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function() {
    var form = document.getElementById('chatSendForm');
    var input = document.getElementById('chatInput');
    var messagesWrap = document.getElementById('chatMessages');
    var emptyEl = document.getElementById('chatEmpty');
    var sendBtn = document.getElementById('chatSendBtn');
    var sendUrl = '{{ route("member.chat.send") }}';
    var messagesUrl = '{{ route("member.chat.messages") }}';
    var urlMessageBase = '{{ url("member/chat/message") }}';
    var csrf = form.querySelector('input[name="_token"]').value;
    var maxMessageId = {{ $messages->isNotEmpty() ? $messages->max('id') : 0 }};
    var pollIntervalId = null;
    var pollIntervalMs = 800;

    function escapeHtml(s) { return (s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\n/g, '<br>'); }

    function renderDateSep(label, date) {
        var div = document.createElement('div');
        div.className = 'member-chat-date-sep';
        if (date) div.setAttribute('data-date', date);
        div.innerHTML = '<span>' + escapeHtml(label || '') + '</span>';
        return div;
    }

    function renderMessage(msg, isMe) {
        var div = document.createElement('div');
        div.className = 'member-chat-msg ' + (isMe ? 'me' : 'them');
        if (msg.id) div.setAttribute('data-message-id', msg.id);
        var bodyHtml = (msg.body || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\n/g, '<br>');
        var ticksHtml = '';
        if (isMe) {
            if (msg.read_at) ticksHtml = '<span class="member-chat-ticks seen" title="مشاهده شده"><i class="ri-check-double-line"></i></span>';
            else ticksHtml = '<span class="member-chat-ticks sent" title="ارسال شده"><i class="ri-check-line"></i></span>';
        }
        var editedHtml = (msg.edited_at) ? '<div class="member-chat-edited">ویرایش شده</div>' : '';
        var moreHtml = '';
        if (isMe && msg.id) {
            moreHtml = '<div class="member-chat-more-wrap"><button type="button" class="member-chat-more" title="گزینه‌ها"><i class="ri-more-2-fill"></i></button><div class="member-chat-dropdown"><button type="button" class="member-chat-dropdown-edit" data-id="' + msg.id + '"><i class="ri-edit-line"></i> ویرایش</button><button type="button" class="member-chat-dropdown-delete" data-id="' + msg.id + '"><i class="ri-delete-bin-line"></i> حذف</button></div></div>';
        }
        var bubbleWrap = '<div class="member-chat-bubble-wrap"><div class="bubble">' + bodyHtml + '</div>' + (isMe ? moreHtml : '') + '</div>';
        var metaHtml = '<div class="member-chat-meta"><span class="time">' + escapeHtml(msg.created_at || '') + '</span>' + ticksHtml + '</div>';
        div.innerHTML = '<div>' + bubbleWrap + metaHtml + editedHtml + '</div>';
        return div;
    }

    function doEditMessage(id, msgEl) {
        var bubble = msgEl.querySelector('.bubble');
        var currentBody = bubble ? (bubble.innerText || bubble.textContent || '') : '';
        var body = prompt('متن جدید پیام:', currentBody);
        if (body === null || body.trim() === '') return;
        fetch(urlMessageBase + '/' + id, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': csrf },
            body: JSON.stringify({ body: body.trim(), _token: csrf })
        }).then(function(r) { return r.json(); }).then(function(data) {
            if (data.message) {
                var b = msgEl.querySelector('.bubble');
                if (b) b.innerHTML = (data.message.body || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\n/g, '<br>');
                if (data.message.edited_at && !msgEl.querySelector('.member-chat-edited')) {
                    var wrap = msgEl.querySelector('.bubble').parentNode;
                    var ed = document.createElement('div'); ed.className = 'member-chat-edited'; ed.textContent = 'ویرایش شده';
                    wrap.appendChild(ed);
                }
            }
        }).catch(function() { alert('خطا در ویرایش'); });
    }

    function doDeleteMessage(id, msgEl) {
        if (!confirm('این پیام حذف شود؟')) return;
        fetch(urlMessageBase + '/' + id, {
            method: 'DELETE',
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': csrf }
        }).then(function(r) { return r.json(); }).then(function(data) {
            if (data.success && msgEl && msgEl.parentNode) msgEl.remove();
        }).catch(function() { alert('خطا در حذف'); });
    }

    function appendMessage(data, isMe, dateLabel) {
        if (emptyEl) emptyEl.style.display = 'none';
        var lastSep = messagesWrap.querySelector('.member-chat-date-sep:last-child');
        var lastDate = lastSep ? lastSep.getAttribute('data-date') || '' : '';
        var msgDate = data.created_date || '';
        if (msgDate && msgDate !== lastDate) {
            messagesWrap.appendChild(renderDateSep(dateLabel || data.date_label || msgDate, msgDate));
        }
        messagesWrap.appendChild(renderMessage(data, isMe));
        if (data.id && data.id > maxMessageId) maxMessageId = data.id;
        messagesWrap.scrollTop = messagesWrap.scrollHeight;
    }

    function stopPolling() {
        if (pollIntervalId) { clearInterval(pollIntervalId); pollIntervalId = null; }
    }

    function updateTicksToSeen(messageId) {
        var el = messagesWrap.querySelector('.member-chat-msg[data-message-id="' + messageId + '"]');
        if (!el) return;
        var ticks = el.querySelector('.member-chat-ticks');
        if (ticks && !ticks.classList.contains('seen')) {
            ticks.className = 'member-chat-ticks seen';
            ticks.title = 'مشاهده شده';
            ticks.innerHTML = '<i class="ri-check-double-line"></i>';
        }
    }

    function pollForNewMessages() {
        fetch(messagesUrl, { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                var messages = data.messages || [];
                var newOnes = messages.filter(function(m) { return m.id > maxMessageId; });
                var fromCoach = newOnes.some(function(m) { return m.is_from_coach; });
                newOnes.forEach(function(msg) {
                    appendMessage(msg, !msg.is_from_coach, msg.date_label);
                });
                messages.forEach(function(m) {
                    if (!m.is_from_coach && m.read_at) updateTicksToSeen(m.id);
                });
                if (newOnes.length > 0 && fromCoach) {
                    if (typeof window.playNotificationSound === 'function') window.playNotificationSound();
                    if (document.hidden) {
                        window._chatUnread = (window._chatUnread || 0) + newOnes.filter(function(m) { return m.is_from_coach; }).length;
                        if (typeof window.setTitleNotification === 'function') window.setTitleNotification(window._chatUnread);
                        if (typeof window.showNotificationToast === 'function') window.showNotificationToast('پیام جدید از مربی', '');
                    }
                }
            })
            .catch(function() {});
    }

    messagesWrap.addEventListener('click', function(e) {
        if (e.target.closest('.member-chat-dropdown')) e.stopPropagation();
        var t = e.target.closest ? e.target.closest('button') || e.target : e.target;
        if (!t) return;
        if (t.classList.contains('member-chat-more')) {
            e.stopPropagation();
            var drop = t.nextElementSibling;
            if (drop) drop.classList.toggle('show');
        } else if (t.classList.contains('member-chat-dropdown-edit')) {
            var msgEl = t.closest('.member-chat-msg');
            var drop = t.closest('.member-chat-dropdown');
            if (drop) drop.classList.remove('show');
            if (msgEl) doEditMessage(t.getAttribute('data-id'), msgEl);
        } else if (t.classList.contains('member-chat-dropdown-delete')) {
            var msgEl = t.closest('.member-chat-msg');
            var drop = t.closest('.member-chat-dropdown');
            if (drop) drop.classList.remove('show');
            if (msgEl) doDeleteMessage(t.getAttribute('data-id'), msgEl);
        }
    });
    document.addEventListener('click', function() {
        messagesWrap.querySelectorAll('.member-chat-dropdown.show').forEach(function(d) { d.classList.remove('show'); });
    });

    pollIntervalId = setInterval(pollForNewMessages, pollIntervalMs);
    document.addEventListener('visibilitychange', function() {
        if (!document.hidden) {
            window._chatUnread = 0;
            if (typeof window.clearTitleNotification === 'function') window.clearTitleNotification();
        }
    });

    document.querySelectorAll('#chatStickerBar .sticker-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var sticker = this.getAttribute('data-sticker') || '';
            if (sticker && input) input.value = (input.value || '') + sticker;
        });
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var body = (input.value || '').trim();
        if (!body) return;

        sendBtn.disabled = true;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', sendUrl);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrf);
        xhr.onload = function() {
            sendBtn.disabled = false;
            if (xhr.status === 200) {
                var res = JSON.parse(xhr.responseText);
                if (res.message) {
                    appendMessage(res.message, true, res.message.date_label);
                    input.value = '';
                    messagesWrap.scrollTop = messagesWrap.scrollHeight;
                }
            } else {
                var err = 'خطا در ارسال. دوباره تلاش کن.';
                try { var r = JSON.parse(xhr.responseText); if (r.error) err = r.error; } catch (_) {}
                alert(err);
            }
        };
        xhr.onerror = function() { sendBtn.disabled = false; alert('خطا در ارتباط.'); };
        xhr.send(JSON.stringify({ body: body, _token: csrf }));
    });
})();
</script>
@endsection
