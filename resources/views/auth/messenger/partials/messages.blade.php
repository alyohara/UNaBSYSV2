

    <div class="card-body text-success">
        <h5 class="card-title">De: {{ $message->user->userData->name.' '.$message->user->userData->lastname  }}</h5>
        <p class="card-text">{{ $message->body }}</p>
    </div>
    <div class="card-footer bg-transparent border-success">Posted {{ $message->created_at->diffForHumans() }}</div>
</div>
