@extends('layouts.master')

@section('content')
<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Detail Amar Putusan</h2>
                        <a href="{{route('pihak_cerai')}}"><button class="btn btn-primary btn-md">Kembali</button></a><br>
                    </div>
                    <div class="normal-table-list mg-t-30">
                        <div class="bsc-tbl-cls">
                            <table class="table table-cl">
                                <tbody>
                                    <colgroup>
                                        <col style="background-color:#00c292">
                                      </colgroup>
                                    <tr>
                                        <td style="width:30%;color:white">Nama Penggungat</td>
                                        <td>{{@$data->pihak1_text}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%;color:white">No. Akta Cerai</td>
                                        <td>{{@$data->nomor_akta_cerai}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%;color:white">Tanggal Putusan</td>
                                        <td>{{@$data->tanggal_putusan}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%;color:white">Pihak Tergugat</td>
                                        <td>{{@$data->pihak2_text}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%;color:white">Amar Putusan</td>
                                        <td>{{strip_tags(@$data->amar_putusan)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
