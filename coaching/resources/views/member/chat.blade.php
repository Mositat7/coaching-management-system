@extends('layouts.member', ['member' => $member])

@section('title', 'چت با مربی | پنل شاگرد')

@section('head')
<style>
    .member-chat-page { height: calc(100vh - 140px); min-height: 420px; display: flex; flex-direction: column; }
    .member-chat-card {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: var(--member-card);
        border: 1px solid var(--member-border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,.06);
    }
    .member-chat-header {
        padding: 14px 20px;
        border-bottom: 1px solid var(--member-border);
        display: flex;
        align-items: center;
        gap: 12px;
        background: var(--member-card);
    }
    .member-chat-header .avatar-wrap {
        width: 44px; height: 44px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--member-primary), var(--member-primary-dark));
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 1.1rem;
    }
    .member-chat-header .title { font-weight: 600; margin: 0; font-size: 1rem; color: var(--member-text, inherit); }
    .member-chat-header .sub { font-size: 0.8rem; color: var(--member-text-muted); margin: 0; }
    .member-chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background: var(--member-bg);
    }
    .member-chat-msg { max-width: 78%; display: flex; gap: 8px; align-items: flex-end; }
    .member-chat-msg.me { align-self: flex-start; flex-direction: row-reverse; }
    .member-chat-msg.them { align-self: flex-end; }
    .member-chat-msg .bubble {
        padding: 10px 14px;
        border-radius: 14px;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    .member-chat-msg.me .bubble {
        background: linear-gradient(135deg, var(--member-primary), var(--member-primary-dark));
        color: #fff;
        border-bottom-left-radius: 4px;
    }
    .member-chat-msg.them .bubble {
        background: var(--member-card);
        border: 1px solid var(--member-border);
        color: var(--member-text, inherit);
        border-bottom-right-radius: 4px;
    }
    .member-chat-meta { margin-top: 4px; display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
    .member-chat-msg .time { font-size: 0.7rem; opacity: .9; }
    .member-chat-msg.me .time { color: rgba(255,255,255,.9); }
    .member-chat-msg.them .time { color: var(--member-text-muted); }
    .member-chat-ticks { display: inline-flex; align-items: center; color: rgba(255,255,255,.9); font-size: 0.9rem; margin-right: 2px; }
    .member-chat-ticks.sent { opacity: .85; }
    .member-chat-ticks.seen { color: #6ab2f2; }
    .member-chat-edited { font-size: 0.65rem; color: rgba(255,255,255,.75); margin-top: 1px; font-style: italic; width: 100%; }
    .member-chat-more-wrap { position: relative; margin-right: auto; }
    .member-chat-more { width: 24px; height: 24px; border: none; background: transparent; color: rgba(255,255,255,.75); cursor: pointer; border-radius: 6px; display: inline-flex; align-items: center; justify-content: center; padding: 0; font-size: 1.1rem; }
    .member-chat-more:hover { background: rgba(255,255,255,.15); color: #fff; }
    .member-chat-dropdown { position: absolute; bottom: 100%; right: 0; margin-bottom: 4px; background: var(--member-card); border: 1px solid var(--member-border); border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,.2); padding: 4px; min-width: 100px; z-index: 50; display: none; }
    .member-chat-dropdown.show { display: block; }
    .member-chat-dropdown button { width: 100%; display: flex; align-items: center; gap: 8px; padding: 8px 12px; border: none; background: none; cursor: pointer; border-radius: 6px; font-size: 0.85rem; color: var(--member-text); text-align: right; }
    .member-chat-dropdown button:hover { background: var(--member-bg); }
    .member-chat-dropdown button i { font-size: 1rem; }
    .member-chat-date-sep { text-align: center; margin: 16px 0 8px; }
    .member-chat-date-sep span { font-size: 0.75rem; color: var(--member-text-muted); background: var(--member-card); padding: 4px 12px; border-radius: 20px; border: 1px solid var(--member-border); }
    .member-chat-sticker-bar { padding: 8px 0; border-bottom: 1px solid var(--member-border); display: flex; flex-wrap: wrap; gap: 6px; align-items: center; }
    .member-chat-sticker-bar .sticker-btn { width: 36px; height: 36px; border: none; background: transparent; border-radius: 8px; font-size: 1.4rem; cursor: pointer; transition: background .15s; }
    .member-chat-sticker-bar .sticker-btn:hover { background: var(--member-bg); }
    .member-chat-input-wrap { padding: 16px 20px; border-top: 1px solid var(--member-border); background: var(--member-card); }
    .member-chat-input-row { display: flex; gap: 10px; align-items: flex-end; }
    .member-chat-input {
        flex: 1;
        padding: 12px 16px;
        border-radius: 12px;
        border: 1px solid var(--member-border);
        font-size: 0.95rem;
        resize: none;
        min-height: 48px;
        max-height: 120px;
        background: var(--member-bg);
        color: var(--member-text);
    }
    .member-chat-input:focus { outline: none; border-color: var(--member-primary); }
    .member-chat-send {
        width: 48px; height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--member-primary), var(--member-primary-dark));
        color: #fff;
        border: none;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        flex-shrink: 0;
        transition: opacity .2s;
    }
    .member-chat-send:hover { opacity: .9; color: #fff; }
    .member-chat-send:disabled { opacity: .6; cursor: not-allowed; }
    .member-chat-empty { flex: 1; display: flex; align-items: center; justify-content: center; color: var(--member-text-muted); padding: 2rem; text-align: center; }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center gap-2 mb-3">
        <a href="{{ route('dashboard.member') }}" class="btn btn-outline-secondary btn-sm rounded-3">
            <i class="ri-arrow-right-line me-1"></i>بازگشت به داشبورد
        </a>
    </div>

    <div class="member-chat-page">
        <div class="member-chat-card">
            <div class="member-chat-header">
                <div class="avatar-wrap">
                    {{ $member->coach ? mb_substr($member->coach->full_name, 0, 1) : 'م' }}
                </div>
                <div class="flex-grow-1">
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
                            <div class="bubble">{{ nl2br(e($m->body)) }}</div>
                            <div class="member-chat-meta">
                                @if(!$m->is_from_coach)
                                    <div class="member-chat-more-wrap">
                                        <button type="button" class="member-chat-more" title="گزینه‌ها"><i class="ri-more-2-fill"></i></button>
                                        <div class="member-chat-dropdown">
                                            <button type="button" class="member-chat-dropdown-edit" data-id="{{ $m->id }}"><i class="ri-edit-line"></i> ویرایش</button>
                                            <button type="button" class="member-chat-dropdown-delete" data-id="{{ $m->id }}"><i class="ri-delete-bin-line"></i> حذف</button>
                                        </div>
                                    </div>
                                @endif
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
                    <div>
                        <i class="ri-chat-3-line d-block fs-1 mb-2 opacity-50"></i>
                        <p class="mb-0 small">هنوز پیامی رد و بدل نشده. می‌تونی اولین پیام رو بفرستی.</p>
                    </div>
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
        var metaHtml = '<div class="member-chat-meta">' + moreHtml + '<span class="time">' + escapeHtml(msg.created_at || '') + '</span>' + ticksHtml + '</div>';
        div.innerHTML = '<div><div class="bubble">' + bodyHtml + '</div>' + metaHtml + editedHtml + '</div>';
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
        if (document.hidden) return;
        fetch(messagesUrl, { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                var messages = data.messages || [];
                var newOnes = messages.filter(function(m) { return m.id > maxMessageId; });
                newOnes.forEach(function(msg) {
                    appendMessage(msg, !msg.is_from_coach, msg.date_label);
                });
                messages.forEach(function(m) {
                    if (!m.is_from_coach && m.read_at) updateTicksToSeen(m.id);
                });
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
        if (document.hidden) stopPolling();
        else { stopPolling(); pollIntervalId = setInterval(pollForNewMessages, pollIntervalMs); }
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
