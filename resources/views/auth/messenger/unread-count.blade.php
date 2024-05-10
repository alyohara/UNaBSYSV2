<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
        <span class="badge badge-danger" style="color: #ffcd39">{{ $count }}</span>
@endif
