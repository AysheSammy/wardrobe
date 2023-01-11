<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('app.login') - @lang('app.app-name')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
</head>
<body class="bg-dark">
@include('admin.layouts.alert')

<div class="container-xl">
    <div class="row justify-content-center align-items-center vh-100 py-3">
        <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xxl-3">
            <div class="bg-light rounded p-4">
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    @honeypot

                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">
                            @lang('app.username')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                               id="username" value="{{ old('username') }}" required autofocus>
                        @error('username')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">
                            @lang('app.password')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                               id="password" value="{{ old('username') }}" required autofocus>
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            @lang('app.rememberMe')
                        </label>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        @lang('app.login')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>