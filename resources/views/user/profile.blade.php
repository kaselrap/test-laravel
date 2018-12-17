@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-12 shadow-sm">
                    <div class="card-header"><h3>{{__('Profile user')}}: {{$user->data['first_name']}} {{$user->data['last_name']}}</h3></div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mt-3 avatar">
                                        <img class="card-img-top" src="{{ env('APP_URL') . '/storage/avatars/' . $user->avatar }}" alt="{{ $user->avatar }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}: </label>
                                        <div class="col-md-6">
                                            <span>{{$user->data['first_name']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<h3 class="card-title">{{$article->title}}</h3>--}}
                            {{--<p class="card-text">{{$article->text}}</p>--}}
                            {{--<div class="text-justify article__text-bottom">--}}
                                {{--<small class="text-muted">by {!! $article->user_name !!}</small>--}}
                                {{--<small class="text-muted">{!! $article->created_at !!}</small>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection