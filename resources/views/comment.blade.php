<div class="comment">
    <div class="row">
        <div class="media mb-4">
            <a href="{!! route('user.profile', ['id' => $comment->user()->select('id')->first()->id]) !!}">
                <img class="d-flex mr-3 rounded-circle"
                     src="{{ env('APP_URL') . '/storage/avatars/' . $comment->user()->select('avatar')->get()->first()->avatar }}"
                     alt="Avatar {{$comment->user()->select('name')->get()->first()->name}}">
            </a>
            <div class="media-body">
                <h5 class="mt-0"><a href="{!! route('user.profile', ['id' => $comment->user()->select('id')->first()->id]) !!}">{!! $comment->user()->select('name')->get()->first()->name !!}</a></h5>
                <p>{!! $comment->text !!}</p>
                <small class="text-muted d-block">{!! $comment->created_at !!}</small>
                <a class="reply-comment" data-value="{{$comment->id}}" href="#">{{__('Reply')}}</a>
                @if($comment->answers()->count() > 0)
                    @foreach($comment->answers()->get() as $answer)
                        <div class="media mt-4">
                            <a href="{!! route('user.profile', ['id' => $answer->user()->select('id')->first()->id]) !!}">
                                <img class="d-flex mr-3 rounded-circle"
                                     src="{{ env('APP_URL') . '/storage/avatars/' . $answer->user()->select('avatar')->get()->first()->avatar }}"
                                     alt="Avatar {{$answer->user()->select('name')->get()->first()->name}}">
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0"><a href="{!! route('user.profile', ['id' => $answer->user()->select('id')->first()->id]) !!}">{!! $answer->user()->select('name')->get()->first()->name !!}</a></h5>
                                {!! $answer->text !!}
                                <small class="text-muted d-block">{!! $answer->created_at !!}</small>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>