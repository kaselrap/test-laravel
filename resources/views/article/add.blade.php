@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Add New Article')}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{route('article.store', ['type' => 'add'])}}" >
                                @csrf

                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" required>{{ old('text') }}</textarea>

                                        @if ($errors->has('text'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="tags" type="tags" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags" required>{{ old('tags') }}</textarea>

                                        @if ($errors->has('tags'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tags') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Preview Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}">

                                        @if ($errors->has('picture'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('picture') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Video') }}</label>

                                    <div class="col-md-6">
                                        <input id="video" type="file" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" value="{{ old('video') }}">

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
                                            {{ __('Add new Article') }}
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