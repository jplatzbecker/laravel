<div class="panel panel-default">
    <div class="panel-heading" id="{{ $reply->creator->id }}">
        <a href="/users/{{ $reply->creator->id }}">
            {{ $reply->creator->name }}
        </a>    said {{ $reply->created_at->diffForHumans() }}...
    </div>

    <div class="panel-body">
        {{ $reply->body }}
    </div>
</div>