@extends('includes.master')


@section('content')
<div class="login-content">
    <!-- Login -->
    <div class="nk-block toggled" id="l-login">
        <div class="nk-form">
            <div class="input-group">
                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                <div class="nk-int-st">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="input-group mg-t-15">
                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                <div class="nk-int-st">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="fm-checkbox">
                {{-- <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label> --}}
            </div>
            <div class="text-right">
                <button class="btn btn-primary btn-sm">Masuk</button>
            </div>
        </div>
    </div>
</div>
@endsection