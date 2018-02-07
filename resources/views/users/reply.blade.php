<div class="panel panel-default">
    <div class="panel-heading">
        Replies from {{ $user->name }}
    </div>
    @foreach ($user->replies as $reply)
    <div class="panel-body">
        <p>
            <a href="/threads/{{ $reply->thread_id }}#{{ $reply->id }}">
                {{ $reply->thread->title }}
            </a>
        </p>
        {{ $reply->body }}
        <hr>
    </div>
    @endforeach
</div>