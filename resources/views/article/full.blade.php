@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="content-section__inner col-md-9">
                <div class="row">
                    <div class="col-md-9">
                        <div class="article full-article">
                            <div class="card mb-12">
                                <div class="card-body">
                                    <img class="card-img-top" data-src="{{ env('APP_URL') . '/storage/articles/' . $article->picture }}" alt="Thumbnail [100%x225]" src="{{ isset($article->picture) ? env('APP_URL') . '/storage/articles/' . $article->picture : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_167986f23f2%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_167986f23f2%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.5%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" data-holder-rendered="true">
                                    <div class="card-body">
                                        <h3 class="card-title">{{$article->title}}</h3>
                                        <div class="article-information article-controll d-flex justify-content-between">
                                            <span class="article-views">Views: {{$article->total_views}}</span>
                                            <div class="col-md-6 justify-content-end d-flex p-0">
                                                <div class="col-md-3 like-dislike d-flex flex-column p-0">
                                                    <div class="like-dislike-inner d-flex justify-content-between">
                                                        <a id="like-{{$article->id}}" href="{{route('article.action', ['action' => 'like', 'id' => $article->id])}}}">
                                                            <i class="fas fa-thumbs-up"></i><span class="like">{{$article->like}}</span>
                                                        </a>
                                                        <a id="dislike-{{$article->id}}" href="{{route('article.action', ['action' => 'dislike', 'id' => $article->id])}}">
                                                            <i class="fas fa-thumbs-down"></i><span class="like">{{$article->dislike}}</span>
                                                        </a>

                                                    </div>
                                                    <div class="progress-bar">
                                                        @if(($article->like + $article->dislike) > 0)
                                                            <div class="progress-bar-inner" style="width: {{intval($article->like / ($article->like + $article->dislike) * 100)}}%"></div>
                                                        @else
                                                            <div class="progress-bar-inner" style="width: 50%"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="article-information col-md-12">
                                                <div class="media mb-4">
                                                    <a href="{!! route('user.profile', ['id' => $article->user()->select('id')->first()->id]) !!}">
                                                        <img class="d-flex mr-3 rounded-circle"
                                                             src="{{ env('APP_URL') . '/storage/avatars/' . $article->user()->select('avatar')->get()->first()->avatar }}"
                                                             alt="Avatar {{$article->user()->select('name')->get()->first()->name}}">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="justify-content-between">
                                                            <div class="first">
                                                                <h6 class="mt-0"><a href="{!! route('user.profile', ['id' => $article->user()->select('id')->first()->id]) !!}">{!! $article->user()->select('name')->get()->first()->name !!}</a></h6>
                                                                <small class="text-muted">{!! $article->created_at !!}</small>
                                                            </div>
                                                            <div class="last">
                                                                <a href="#">{{__('Subscribe')}} 97K</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="card-text">{{$article->text}}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row comments">
                    <div class="col-md-9">
                        <div class="card mb-12">
                            <div class="comments-body">
                                <h5 class="comments-title" data-value="{{$article->comments()->count()}}">
                                    ({{$article->comments()->count()}}) commentaries
                                </h5>
                                @guest

                                @else
                                    <div class="comments-form">
                                        @include('article.comment-form', ['article' => $article])
                                    </div>
                                    <hr>
                                @endguest
                                <div class="comments-window">
                                    @if($comments = $article->comments()->where('answered_comment_id', null)->get())
                                        @foreach($comments as $comment)
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
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#like-{{$article->id}}").on('click', function (e) {
                e.preventDefault();
                let url = "{{route('article.action', ['action' => 'like', 'id' => $article->id])}}";
                $.ajax({
                    url: url,
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if ( data.like != undefined ) {
                            $('#like-{{$article->id}} span.like').text(data.like);
                            $('.progress-bar-inner').css({
                                width: data.percentage + '%'
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr);
                    }
                });
            });
            $("#dislike-{{$article->id}}").on('click', function (e) {
                e.preventDefault();
                let url = "{{route('article.action', ['action' => 'dislike', 'id' => $article->id])}}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if ( data.dislike != undefined ) {
                            $('#dislike-{{$article->id}} span.like').text(data.dislike);
                            $('.progress-bar-inner').css({
                                width: data.percentage + '%'
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
@endpush
