@extends('layouts.app')
@section('content')
    <div class="content-section__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Подписки')}}</div>
                    <div class="card-body">
                        @if($articles)
                            <div class="row">
                                @each('article', $articles, 'article')
                            </div>
                            <div class="row">
                               {{$articles->links()}}
                            </div>
                        @else
                            <div class="col-12 text-center">
                                <p class="text-center">Видеофайлы не найдены</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection