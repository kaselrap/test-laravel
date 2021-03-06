@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($article->id)
                        <div class="card-header">{{__('Редактировать видео')}}</div>
                    @else
                        <div class="card-header">{{__('Добавить видео')}}</div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning" role="alert">
                                        {!! $error !!}
                                    </div>
                                @endforeach
                            @endif


                            <form method="POST" action="{!! route('article.store', ['type' => 'edit', 'id' => $article->id]) !!}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title',$article->title) }}" required autofocus>

                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" required>{{ old('text', $article->text) }}</textarea>

                                        @if ($errors->has('text'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="active" value="{{$article->active}}" {{$article->active === 1 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="customSwitch1">Отображать видео для всех</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Загрузитк видео') }}</label>

                                    <div class="col-md-6">
                                        <input id="video" type="file" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video">
                                        @if ($article->video)
                                            <div class="card mt-3" style="width: 18rem;height: 190px;overflow: hidden">
                                                <video class="card-img-top" style="object-fit: cover; height: 190px" src="{{ env('APP_URL') . '/storage/videos/' . $article->video }}" alt="{{ $article->fullName }}">
                                            </div>
                                        @endif
                                        @if ($errors->has('video'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('video') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Сохранить') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#customSwitch1').change(function () {
                this.value = this.checked ? 1 : 0;
            });
        });
    </script>
@endpush