@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($profile->id)
                        <div class="card-header">{{__('Edit Profile')}} - #{{$profile->id}}</div>
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


                        <form class="form-profile" method="POST" action="{!! route('profile.store', ['id' => $profile->id]) !!}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="first-name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first-name" type="text" class="form-control{{ $errors->has('first-name') ? ' is-invalid' : '' }}" name="data[first_name]" value="{{ old('first-name',$profile->data['first_name']) }}" autofocus>

                                    @if ($errors->has('first-name'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first-name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first-name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last-name" type="text" class="form-control{{ $errors->has('last-name') ? ' is-invalid' : '' }}" name="data[last_name]" value="{{ old('last-name',$profile->data['last_name']) }}">

                                    @if ($errors->has('last-name'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last-name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genderSelect" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" id="genderSelect" name="data[gender]"  value="{{ old('gender',$profile->data['gender']) }}">
                                            @foreach($gender as $key=>$value)
                                                <option value="{{$key}}"{!! $key == old('gender', $profile->getData('gender')) ? ' selected="selected"' : '' !!}>{{ucfirst($value)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dataOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dataOfBirth" type="date" class="form-control{{ $errors->has('dateOfBirth') ? ' is-invalid' : '' }}" name="data[date_of_birth]" value="{{ old('dataOfBirth',$profile->data['date_of_birth']) }}">

                                    @if ($errors->has('dataOfBirth'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dataOfBirth') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="js-example-basic-single form-control" name="data[country]">
                                            @if (!empty($profile->getData('country')))
                                            <option selected="selected">{!! $profile->getData('country') !!}</option>
                                            @endif
                                        </select>
                                    </div>
                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="avatar">{{ __('Avatar') }}:</label>
                                <div class="col-md-6">
                                    <input style="height: 42px !important;" type="file" id="avatar" class="form-control"  name="avatar"/>
                                    @if (!empty($profile->avatar))
                                        <div class="card mt-3 avatar">
                                            <img class="card-img-top" src="{{ env('APP_URL') . '/storage/avatars/' . $profile->avatar }}" alt="{{ $profile->avatar }}">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .form-profile .avatar {
            width: 90px;
            height: 90px;
            overflow: hidden;
        }
        .form-profile .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush

@push('select2-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                ajax: {
                    url: "{{route('countries')}}",
                    dataType: 'json',
                    processResults: function (data) {
                        // Tranforms the top-level key of the response object from 'items' to 'results'
                        console.log(data);
                        return data;
                    }
                }
            });
        });
    </script>
@endpush