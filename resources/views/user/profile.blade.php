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
                                    <div class="form-group row pb-0 mb-0">
                                        <label class="col-md-4 col-form-label text-md-left">{{ __('First Name') }}: </label>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <span>{{$user->data['first_name']}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row pb-0 mb-0">
                                        <label class="col-md-4 col-form-label text-md-left">{{ __('Last Name') }}: </label>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <span>{{$user->data['last_name']}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row pb-0 mb-0">
                                        <label class="col-md-4 col-form-label text-md-left">{{ __('Gender') }}: </label>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <?php $gender = [
                                                'male',
                                                'femail'
                                            ]; ?>
                                            @foreach($gender as $key=>$value)
                                                @if($key==$user->data['gender'])
                                                    {{--<option value="{{$key}}"{!! $key == old('gender', $profile->getData('gender')) ? ' selected="selected"' : '' !!}>{{ucfirst($value)}}</option>--}}
                                                    <span>{{ucfirst($value)}}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row pb-0 mb-0">
                                        <label class="col-md-4 col-form-label text-md-left">{{ __('Date of birth') }}: </label>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <span>{{$user->data['date_of_birth']}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row pb-0 mb-0">
                                        <label class="col-md-4 col-form-label text-md-left">{{ __('Country') }}: </label>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <span>{{$user->data['country']}}</span>
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