@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if( isset($query) && !empty($query) )
                        <div class="card-header"><strong>{{__('Videos found by query')}} - {!! $query !!}</strong></div>
                    @else
                        <div class="card-header">{{__('Videos by')}} - {!! auth()->user()->data['first_name'] !!} {!! auth()->user()->data['last_name'] !!}</div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(\count($articles))
                            <div class="row">
                                @each('article.index', $articles, 'article')
                            </div>
                            {{$articles->links()}}
                        @else
                            @if( isset($query) && !empty($query) )
                                <div class="col-12 text-center">
                                    <p class="text-center">Not fount videos</p>
                                </div>
                            @else
                                <div class="col-12 text-center">
                                    <a href="{{route('article.add')}}" class="btn btn-primary text-center">
                                        {{ __('Add new video') }}
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