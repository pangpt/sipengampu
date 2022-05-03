@extends('includes.master')

{{-- @extends('includes.master') --}}


@section('content')

<div class="login-content">
    <!-- Login -->
    <div class="nk-block toggled">
        <div class="nk-form">
            <div class="mb-2">
                <img src="{{url('img/logo/logo-big.png')}}" style="max-height: 100px;  max-width: 350px; margin-bottom:20px" alt="">
                <h3 style="margin-bottom: 20px">Sipengampu</h3>
                {{-- <h4>Bentuk kerjasama antara PA Watampone dan KUA</h4> --}}
            </div>
            @if(session('error'))
                    <div class="alert alert-danger alert-mg-b-0" role="alert">
                        {{session('error')}}
                    </div>
                @endif
            <div class="nk-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-user"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-key"></i></span>
                        <div class="nk-int-st">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="fm-checkbox">
                        {{-- <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label> --}}
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Masuk</button>
                    </div>
            </form>
        </div>
            <div class="mb-2">
                <p style="font-size: 12px;margin-top: 50px">&copy; Tim IT Pengadilan Agama Watampone 2021</p>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
