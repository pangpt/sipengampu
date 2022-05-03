@extends('layouts.master')

@section('content')
<div class="data-table-area">
        <div class="container">
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tabel Amar Putusan</h2>
                            <p>Data pada tabel ini diambil dari database SIPP Pengadilan Agama Watampone dan dilakukan update setiap harinya. </p>
                            <a href="{{route('exportputusan')}}" target="_blank"><button class="btn btn-success btn-md">Download Excel</button></a><br>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Penggugat</th>
                                        <th>No. Akta Cerai</th>
                                        <th>Tgl Akta Cerai</th>
                                        <th>Amar Putusan</th>
                                        <th>Tanggal Putus</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data))
                                    @foreach($data as $key)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$key->pihak1_text}}</td>
                                        <td>{{$key->nomor_akta_cerai}}</td>
                                        <td>{{$key->tgl_akta_cerai}}</td>
                                        <td>{{strip_tags(substr($key->amar_putusan, 0, 100))}}...</td>
                                        <td>{{$key->tanggal_putusan}}</td>
                                        <td>
                                            <a class="btn-detail" href="{{route('detailamar',['id'=>$key->perkara_id])}}">
                                                <button data-toggle="tooltip" data-placement="left" title="Detail" ><i class="fa fa-eye"></i></button>
                                            </a>
                                            <!--<a class="btn-hapus" data-target="#modalEdit" data-toggle="modal" href="#" data-id="{{$key->perkara_id}}" data-url="{{route('hapuspihak', ['id' => $key->perkara_id])}}">-->
                                            <!--    <button data-toggle="tooltip" data-placement="left" title="Hapus" ><i class="fa fa-trash"></i></button>-->
                                            <!--</a>-->
                                            {{-- <button><i class="fa fa-trash"></i></button> --}}
                                        </td>

                                    @endforeach
                                    @else
                                        {{-- <td colspan="9" class="text-center">Data tidak ada</td> --}}
                                    @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDetail" role="dialog">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Detail Amar Putusan</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="contact-dt">
                                <ul class="contact-list widget-contact-list">
                                    <li><span>Nama Penggugat :<span> {{@$key->nomor_perkara}}</li>
                                    <li><span>No. Akta Cerai :<span> {{@$key->no_akta}}</li>
                                    <li><span>No. Akta Cerai :<span> {{@$key->seri_akta}}</li>
                                    <li><span>No. Akta Cerai :<span>  {{@$key->no_perkara}}</li>
                                    <li><span>No. Akta Cerai :<span>  {{@$key->no_perkara}}</li>
                                    <li><span>No. Akta Cerai :<span>  {{@$key->no_perkara}}</li>
                                    <li><span>No. Akta Cerai :<span>  {{@$key->no_perkara}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Kembali</button>
                    {{-- <button type="submit" class="btn btn-default btn-success">Ya</button> --}}
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="modal fade" id="modalEdit" role="dialog">
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
        $('.btn-edit').click(function () {
            var dataFile = $(this).data('file_putusan');
            console.log(dataFile)
            var dataId = $(this).data('id');
            var dataFile = $(this).data('file_putusan');
            // console.log(dataId)

            var confirmUrl = window.location.origin + '/admin' + '/editputusan' + dataId;

            $('.row #putusan').val(dataFile);

            $('#form-modal').attr('action', confirmUrl);
        })

        $('.btn-hapus').on('click', function() {
            id = $(this).data('id');
            url = $(this).data('url');
            $('#hapus').attr('href', url);
        })
    });

</script>
@endsection
