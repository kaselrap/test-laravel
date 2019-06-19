@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-12 shadow-sm">
                    <div class="card-header"><h3>{{__('Профиль пользователя')}}: {{$user->data['first_name']}} {{$user->data['last_name']}}</h3></div>
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
                                            <label class="col-md-4 col-form-label text-md-left">{{ __('Имя') }}: </label>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <span>{{$user->data['first_name']}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pb-0 mb-0">
                                            <label class="col-md-4 col-form-label text-md-left">{{ __('Фамилия') }}: </label>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <span>{{$user->data['last_name']}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pb-0 mb-0">
                                            <label class="col-md-4 col-form-label text-md-left">{{ __('Пол') }}: </label>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <span>{{__($user->getData('gender'))}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pb-0 mb-0">
                                            <label class="col-md-4 col-form-label text-md-left">{{ __('Дата рождения') }}: </label>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <span>{{$user->getData('date_of_birth')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pb-0 mb-0">
                                            <label class="col-md-4 col-form-label text-md-left">{{ __('Страна') }}: </label>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <span>{{$user->getData('country')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pb-0 mb-0">
                                            <label class="col-md-4 col-form-label text-md-left">{{ __('Недавнее видео') }}: </label>
                                            <div class="col-md-8 d-flex align-items-center flex-column">
                                                @if($article = $user->articles()->orderBy('total_views', 'DESC')->first())
                                                <video class="card-img-top" style="object-fit: cover; height: 190px" src="{{ env('APP_URL') . '/storage/videos/' . $article->video }}#t=12" alt="{{ $article->fullName }}">
                                                </video>
                                                <div class="card-body p-0 w-100">
                                                    <a class="card-title" href="{{route('article.full', $article->id)}}">{{$article->title}}</a>
                                                    <a class="text-muted d-block" href="{{route('user.profile', ['id' => $article->user_id ])}}">{!! $article->user_name !!}</a>
                                                    <span class="text-muted d-block">Views: {{$article->total_views}}</span>
                                                    {{--<span class="text-muted d-block">Views: {{$article->ip()->count()}}</span>--}}
                                                    <span class="text-muted d-block">
                                                        @include('article.created_at')
                                                    </span>
                                                </div>
                                                <a class="d-block pt-2 show-more" href="{!! route('user.articles', ['id' => $user->id]) !!}">{{__('Все видео')}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        @guest
                                        @else
                                            @if(auth()->user()->id !== $user->id )
                                                @if($user->subscribers()->where('subscriber_id', auth()->user()->id)->count() > 0)
                                                    <a class="btn btn-light subscribed" href="#">{{__('Подписан')}}</a>
                                                @else
                                                    <a class="btn btn-danger subscribe" href="#">{{__('Подписаться')}}</a>
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
                                                                        .text('Подписан');
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
                                                                        .text('Подписаться');
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