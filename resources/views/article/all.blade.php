@extends('layouts.app')

@section('content')
    <div class="content-section__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if( isset($query) && !empty($query) )
                        <div class="card-header"><strong>{{__('Articles found by query')}} - {!! $query !!}</strong></div>
                    @else
                        <div class="card-header">{{__('All Articles')}}</div>
                    @endif
                    <div class="card-body">
                        @if(\count($articles))
                            <div class="row">
                                @foreach($articles as $article)
                                    <div class="col-md-2">
                                        <div class="article">
                                            <div class="card mb-4">
                                                <img class="card-img-top" data-src="{{ env('APP_URL') . '/storage/articles/' . $article->picture }}" alt="Thumbnail [100%x225]" style="height: 124px; width: 100%; display: block;" src="{{ isset($article->picture) ? env('APP_URL') . '/storage/articles/' . $article->picture : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_167986f23f2%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_167986f23f2%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.5%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" data-holder-rendered="true">
                                                <div class="card-body">
                                                    <a class="card-title" href="{{route('article.full', $article->id)}}">{{$article->title}}</a>
                                                    <a class="text-muted d-block" href="{{route('user.profile', ['id' => $article->user_id ])}}">{!! $article->user_name !!}</a>
                                                    <span class="text-muted d-block">Views: {{$article->total_views}}</span>
                                                    {{--<span class="text-muted d-block">Views: {{$article->ip()->count()}}</span>--}}
                                                    <span class="text-muted d-block">
                                                        <?php
                                                        $created_at = $article->created_at->diff(\Carbon\Carbon::now());
                                                        if( $created_at->d != 0 ) {
                                                            if( $created_at->m !== 0 ) {
                                                                echo $created_at->format("%m months ago");
                                                            } else {
                                                                echo $created_at->format("%d days ago");
                                                            }
                                                        } else {
                                                            echo $created_at->format("%h hours ago");
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{$articles->links()}}
                                </div>
                            </div>
                        @else
                            <div class="col-12 text-center">
                                <p class="text-center">Not fount articles</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection