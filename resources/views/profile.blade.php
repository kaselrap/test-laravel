@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($profile->id)
                        <div class="card-header">{{__('Profile')}} - #{{$profile->id}}</div>
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

                        <div class="user-profile">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection