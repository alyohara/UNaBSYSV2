<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="card {{ $class }} "  style="margin-bottom: 30px" >
    <a href="{{ route('messages.show', $thread->id) }}">
        <h5 class="card-header">{{ $thread->subject }}  ({{ $thread->userUnreadMessagesCount(Auth::id()) }} sin leer)</h5>
    </a>
    <div class="card-body">
        <h5 class="card-title">{{ $thread->latestMessage->body }}</h5>
        <p>
            <small><strong>Creador:</strong> {{ $thread->creator()->username }}</small>
        </p>
{{--        <p>--}}
{{--            <small><strong>Participantes:</strong> {{ $thread->participantsString(Auth::id()) }}</small>--}}
        </p>
    </div>
</div>
