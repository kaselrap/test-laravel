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
                                <div class="col-md-6 d-flex flex-column justify-content-between">
                                    <div class="up">
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
                                        <div class="form-group row pb-0 mb-0">
                                            <label class="col-md-4 col-form-label text-md-left">{{ __('Popular upload') }}: </label>
                                            <div class="col-md-6 d-flex align-items-center flex-column">

                                                <?php
                                                $article = $user->articles()->orderBy('total_views', 'DESC')->first();
                                                ?>
                                                <img class="card-img-top" data-src="{{ env('APP_URL') . '/storage/articles/' . $article->picture }}" alt="Thumbnail [100%x225]" style="height: 124px; width: 100%; display: block;" src="{{ isset($article->picture) ? env('APP_URL') . '/storage/articles/' . $article->picture : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_167986f23f2%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_167986f23f2%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.5%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" data-holder-rendered="true">
                                                <div class="card-body p-0 w-100">
                                                    <a class="card-title" href="{{route('article.full', $article->id)}}">{{$article->title}}</a>
                                                    <a class="text-muted d-block" href="{{route('user.profile', ['id' => $article->user_id ])}}">{!! $article->user_name !!}</a>
                                                    <span class="text-muted d-block">Views: {{$article->total_views}}</span>
                                                    {{--<span class="text-muted d-block">Views: {{$article->ip()->count()}}</span>--}}
                                                    <span class="text-muted d-block">
                                                    @include('article.created_at')
                                                </span>
                                                </div>
                                                <a class="d-block pt-2 show-more" href="{!! route('user.articles', ['id' => $user->id]) !!}">{{__('All articles')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        @guest
                                        @else
                                            @if(auth()->user()->id !== $user->id )
                                                @if($user->subscribers()->where('subscriber_id', auth()->user()->id)->count() > 0)
                                                    <a class="btn btn-light subscribed" href="#">{{__('Subscribed')}}</a>
                                                @else
                                                    <a class="btn btn-danger subscribe" href="#">{{__('Subscribe')}}</a>
                                                @endif
                                                @push('scripts')
                                                    <script>
                                                        $(document).on('click', '.subscribe', function (e) {
                                                            e.preventDefault();
                                                            let self = $(this);
                                                            $.ajax({
                                                                url: "{{route('user.subscription', ['type' => 'subscribe','id' => $user->id])}}",
                                                                type: 'post',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                },
                                                                success: function (data) {
                                                                    self
                                                                        .removeClass('subscribe')
                                                                        .removeClass('btn-danger')
                                                                        .addClass('subscribed')
                                                                        .addClass('btn-light')
                                                                        .text('Subscribed');
                                                                }
                                                            });
                                                        });
                                                        $(document).on('click', '.subscribed', function (e) {
                                                            e.preventDefault();
                                                            let self = $(this);
                                                            $.ajax({
                                                                url: "{{route('user.subscription', ['type' => 'unsubscribe','id' => $user->id])}}",
                                                                type: 'post',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                },
                                                                success: function (data) {
                                                                    self
                                                                        .removeClass('subscribed')
                                                                        .removeClass('btn-light')
                                                                        .addClass('subscribe')
                                                                        .addClass('btn-danger')
                                                                        .text('Subscribe');
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                @endpush
                                            @endif
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection