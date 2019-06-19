@extends('layouts.app')

@section('content')
    <div class="content-section__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if( isset($query) && !empty($query) )
                        <div class="card-header"><strong>{{__('Videos found by query')}} - {!! $query !!}</strong></div>
                    @else
                        <div class="card-header">{{__('All Videos')}}</div>
                    @endif
                    <div class="card-body">
                        @if(\count($articles))
                            <div class="row">
                                @foreach($articles as $article)
                                    <div class="col-md-2">
                                        <div class="article">
                                            <div class="card mb-4">
                                                <video class="card-img-top" style="object-fit: cover;" src="{{ env('APP_URL') . '/storage/videos/' . $article->video }}" alt="{{ $article->fullName }}">
                                                </video>
                                                <div class="card-body">
                                                    <a class="card-title" href="{{route('article.full', $article->id)}}">{{$article->title}}</a>
                                                    <a class="text-muted d-block" href="{{route('user.profile', ['id' => $article->user_id ])}}">{!! $article->user_name !!}</a>
                                                    <span class="text-muted d-block">Views: {{$article->total_views}}</span>
                                                    {{--<span class="text-muted d-block">Views: {{$article->ip()->count()}}</span>--}}
                                                    <span class="text-muted d-block">
                                                        @include('article.created_at')
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
                                <p class="text-center">Not fount videos</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection