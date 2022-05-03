@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-example-wrap">
                <div class="cmp-tb-hd">
                    <h2>Ubah Data Profil</h2>
                    <p>Ubah data profil jika ingin mengubah, kemudian tekan tombol <code>submit</code>.<p>
                </div>
                <form method="POST" action="{{route('editprofil')}}">
                    @csrf
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Nama Lengkap :</label>
                            <div class="nk-int-st">
                                <input type="text" name="name" value="{{$usr->name}}" class="form-control input-sm" placeholder="Enter Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Username : <code>Jika username diubah, maka otomatis akan logout</code></label>
                            <div class="nk-int-st">
                                <input type="text" name="username" value="{{$usr->username}}" class="form-control input-sm" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Password : <code>(Kosongkan jika tidak ingin mengubah password)</code></label>
                            <div class="nk-int-st">
                                <input type="password" name="password" class="form-control input-sm" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <button class="btn btn-success notika-btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

