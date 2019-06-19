@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if( isset($query) && !empty($query) )
                        <div class="card-header"><strong>{{__('Видео найденные по запросу')}} - {!! $query !!}</strong></div>
                    @else
                        <div class="card-header">{{__('Видео от')}} - {!! auth()->user()->data['first_name'] !!} {!! auth()->user()->data['last_name'] !!}</div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($articles)
                            <div class="row">
                                @each('article.index', $articles, 'article')
                            </div>
                            {{$articles->links()}}
                        @else
                            @if( isset($query) && !empty($query) )
                                <div class="col-12 text-center">
                                    <p class="text-center">Видео не найдены</p>
                                </div>
                            @else
                                <div class="col-12 text-center">
                                    <a href="{{route('article.add')}}" class="btn btn-primary text-center">
                                        {{ __('Добавить новое видео') }}
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection