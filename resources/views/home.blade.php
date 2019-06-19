@extends('layouts.app')

@section('content')
    <div class="content-section__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if( isset($query) && !empty($query) )
                        <div class="card-header"><strong>{{__('Videos found by query')}} - {!! $query !!}</strong></div>
                    @else
                        <div class="card-header">{{__('Recent Videos')}}</div>
                    @endif
                    <div class="card-body">
                        @if(\count($articles))
                            <div class="row">
                                @for($i = 0; $i < 9; $i++)
                                    @each('article', $articles, 'article')
                                @endfor
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{route('article.all')}}" class="show-more">{{__('Show More')}}</a>
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