@extends('default')

@section('title', '')

@section('stylesheets')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href={{ URL::asset('css/home.css') }}>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row register-page-form-wrap">

            <div class="col-md-4 register-page-form-body">

                {!! Form::open(['action' => 'Auth\AuthController@postLogin', 'method' => 'POST']) !!}

                @include('info.info')

                <div class="{{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    <div class="error-block-custom">
                        @if($errors->has('email'))
                            <span>{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="{{ $errors->has('password') ? 'has-error' : '' }}">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                    <div class="error-block-custom">
                        @if($errors->has('password'))
                            <span>{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                {!! Form::token() !!}

                {{ Form::submit('GO', ['class' => 'btn btn-success']) }}

                <span><a href="register" class="btn btn-success custom-link">REGISTRATION</a></span>

                <span><a href="#" class="btn btn-success custom-link">FORGOT?</a></span>

                {!! Form::close() !!}
            </div>
        </div>

    </div>

@stop

@section('scripts')
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>


    <!--Bootstrap javascript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script type="text/javascript" src={{ URl::asset('js/home.js') }}></script>

@stop