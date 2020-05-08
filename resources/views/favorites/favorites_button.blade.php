@if (Auth::id() != $micropostId->id)
    @if (Auth::user()->is_favorites($micropost->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-warning btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
            {!! Form::submit('Follow', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif