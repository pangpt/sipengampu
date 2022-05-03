@extends('layouts.master')

@section('content')
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-windows"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Tambah Pengguna</h2>
                                    <p>Tambahkan pengguna sebagai user aplikasi ini</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="#" data-target="#modalTambah" data-toggle="modal">
                                <button data-toggle="tooltip" data-placement="left" title="Tambahkan Pengguna" class="btn"><i class="fa fa-plus"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('success'))
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                <div class="breadcomb-list" style="background: transparent;">
                    <div class="row">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>{{session('success')}}
                            </div>
                    </div>
                </div>
            </div>
            @endif
            @if(session('error'))
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                <div class="breadcomb-list" style="background: transparent;">
                    <div class="row">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>{{session('error')}}
                            </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tabel Pengguna</h2>
                            <p>Keterangan isi tabel</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data))
                                    @foreach($data as $key)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$key->name}}</td>
                                        <td>{{$key->username}}</td>
                                        <td>{{$key->level}}</td>
                                        <td>
                                            <a class="btn-edit" href="#" data-target="#modalEdit" data-toggle="modal" data-id="{{$key->id}}" data-name="{{$key->name}}" data-username="{{$key->username}}">
                                                <button><i class="fa fa-edit"></i></button>
                                            </a>
                                            <a class="btn-hapus" href="#" data-target="#modalHapus" data-toggle="modal"  data-id="{{$key->id}}" data-url="{{route('hapuspengguna', ['id' => $key->id])}}">
                                                <button data-toggle="tooltip" data-placement="left" title="Hapus"><i class="fa fa-trash"></i></button>
                                            </a>
                                            {{-- <button><i class="fa fa-trash"></i></button> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <td colspan="6">Tidak Ada Data Pengguna</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalTambah" role="dialog">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('addpengguna')}}" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-male"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-user-secret"></i>
                                </div>
                                <div class="nk-int-st">
                                    <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" name="level">
											<option>- Pilih Level -</option>
											<option value="Superadmin">Superadmin</option>
											<option value="Admin">Admin</option>
											{{-- <option value="User">User</option> --}}
										</select>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-default btn-success">Ya</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Data</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form-modal-edit" action="#" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-male"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" id="name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="username" class="form-control" placeholder="Username" id="username" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fa fa-user-secret"></i>
                                </div>
                                <div class="nk-int-st">
                                    <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" name="level">
											<option>- Pilih Level -</option>
											<option value="Superadmin">Superadmin</option>
											<option value="Admin">Admin</option>
											<option value="User">User</option>
										</select>
                                </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
                    <a href="edit"><button type="submit" class="btn btn-default btn-success">Ya</button></a>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalHapus" role="dialog">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Hapus Data</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                {{-- <form action="{{route('editputusan',['id' => $key->id])}}" method="POST" id="form-modal"> --}}
                    {{-- {{ csrf_field() }} --}}
                    {{-- {{ method_field('PUT') }} --}}
                    <div class="modal-body">
                        <h4>Apakah anda yakin?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
                        <a id="hapus"> <button type="submit" class="btn btn-default btn-success">Ya</button></a>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection

@section('js_after')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-edit').on('click', function() {
            // jQuery('#modalEdit').modal('show');
            name = $(this).data('name');
            username = $(this).data('username');
            id = $(this).data('id');
            // console.log(id)
            urlEdit = window.location.origin + '/admin/' + 'editpengguna/' + id;
            console.log(urlEdit)
            // console.log(username)

            $('#form-modal-edit').attr('action', urlEdit);
            $('#name').attr('value', name);
            $('#username').attr('value', username);
        })
        $('.btn-hapus').on('click', function() {
            id = $(this).data('id');
            url = $(this).data('url');
            $('#hapus').attr('href', url);
        })
    })
</script>

@endsection
