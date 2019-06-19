@extends('layouts.app')

@section('content')
    <div class="content-section__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if( isset($query) && !empty($query) )
                        <div class="card-header"><strong>{{__('Видео найденные по запросу')}} - {!! $query !!}</strong></div>
                    @else
                        <div class="card-header">{{__('Недавние видео')}}</div>
                    @endif
                    <div class="card-body">
                        @if($articles)
                            <div class="row">
                                @each('article', $articles, 'article')
                            </div>

                            @if(count($articles) >= 12)
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('article.all')}}" class="show-more">{{__('Show More')}}</a>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="col-12 text-center">
                                <p class="text-center">Видео не найдены</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection