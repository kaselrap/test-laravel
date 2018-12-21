@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($article->id)
                        <div class="card-header">{{__('Edit Article')}}</div>
                    @else
                        <div class="card-header">{{__('Add new Article')}}</div>
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
                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

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
                                    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" required>{{ old('text', $article->text) }}</textarea>

                                        @if ($errors->has('text'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tagsSelect" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" id="tagsSelect" name="tag" multiple value="{{ isset($article->tag) && !empty($article->tag) ? old('tags',$article->tag) : '' }}">
                                        @if ($errors->has('tag'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tag') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Link to video') }}</label>

                                    <div class="col-md-6">
                                        <input id="video" type="text" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" value="{{ old('video',$article->video) }}">

                                        @if ($errors->has('video'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('video') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="image">{{ __('Upload Picture') }}:</label>
                                    <div class="col-md-6">
                                        <input style="height: 42px !important;" type="file" id="image" class="form-control"  name="picture"/>
                                        @if ($article->picture)
                                            <div class="card mt-3" style="width: 18rem;">
                                                <img class="card-img-top" src="{{ env('APP_URL') . '/storage/articles/' . $article->picture }}" alt="{{ $article->fullName }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save the Article') }}
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
@push('select2-css')
    <link rel="stylesheet" href="{{asset('css/selectize.css')}}">
@endpush
@push('select2-js')
    <script src="{{asset('js/selectize.js')}}"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tagsSelect').selectize({
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    }
                }
            });
        });
    </script>
@endpush