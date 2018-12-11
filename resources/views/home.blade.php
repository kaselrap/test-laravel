@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(count($articles)>0)
                            <div class="articles">
                                @foreach($articles as $article)
                                    <div class="article">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="article--title">
                                                    <h2 class="title">{{$article->title}}</h2>
                                                </div>
                                                {{--<p class="article--text">{{$article->description}}</p>--}}
                                            </div>
                                            <div class="col-md-2">
                                                <div class="control-button">
                                                    <h5 class="edit"><a href="{{route('article.edit', ['id'=>$article->id])}}">{{__('Edit')}}</a></h5>
                                                    <h5 class="delete">
                                                        <a href="{{route('article.delete', ['id'=>$article->id])}}"
                                                           onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                                            {{__('Delete')}}
                                                        </a>
                                                        <form id="delete-form" action="{{ route('article.delete', ['id'=>$article->id]) }}" method="POST" style="display: none;">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <center>
                                <a href="{{route('article.index')}}" class="btn btn-primary">
                                    {{ __('Add new Article') }}
                                </a>
                            </center>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
