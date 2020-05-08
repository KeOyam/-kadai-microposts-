<ul class="list-unstyled">
    @foreach ($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        @if (Auth::id() != $micropost->id)
                            @if (Auth::user()->is_favorites($micropost->id))
                                {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Unfavorite', ['class' => "btn btn-warning btn-sm form-inline mr-2"]) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
                                    {!! Form::submit('favorite', ['class' => "btn btn-success btn-sm form-inline mr-2"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                        @if (Auth::id() == $micropost->user_id)
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm form-inline']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}