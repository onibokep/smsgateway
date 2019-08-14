@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Laporan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Periode Laporan Permohonan Surat</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <form id="" method="post" action="{{ route('laporan-surat') }}" class="form-inline">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-sm-4">Dari : </label>
                                <div class="col-sm-8">
                                    <div id="awal-surat" class="laporan">
                                        <div class="input-group date" >
                                            <input type="text" class="form-control" name="tgl1" id="tgl1" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Sampai : </label>
                                <div class="col-sm-8">
                                    <div id="ahir-surat" class="laporan">
                                        <div class="input-group date" >
                                            <input type="text" class="form-control" name="tgl2" id="tgl2" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary tampil" type="button"><i class="fa fa-file-pdf-o"></i>&nbsp; Tampilkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="laporan-surat" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Preview Data Permohonan Surat</h4>
                </div>
                <div class="modal-body">
                    <div class="surat"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-window-close"></i> Keluar</button>
                </div>
            </div>
        </div>
    </div>

@stop()
@push('script')
<script>
    $(document).ready(function () {
        $('.laporan .input-group.date').datepicker({
            language: "id",
            orientation: "bottom auto",
            autoclose: true,
            format: "dd-mm-yyyy",
        });

        $('.tampil').click(function (e) {
            e.preventDefault();
            var tg1, tg2;
            tg1 = $('#tgl1').val();
            tg2 = $('#tgl2').val();

            tgl1 = tg1.split("-");
            tgl2 = tg2.split("-");

            if (tg1 == "" || tg2 == "") {
                $.alert({
                    icon: 'fa fa-warning',
                    title: 'Peringatan',
                    content: 'Tanggal laporan harus diisi !',
                    type: 'red',
                    buttons: {
                        ok: {
                            btnClass: 'btn-danger',
                        }
                    }
                });
            } else if (tgl1[1]+tgl1[0] > tgl2[1]+tgl2[0]){
                $.alert({
                    icon: 'fa fa-warning',
                    title: 'Peringatan',
                    content: 'Tanggal akhir harus lebih besar !',
                    type: 'red',
                    buttons: {
                        ok: {
                            btnClass: 'btn-danger',
                        }
                    }
                });
            }else{
                $.ajax({
                    type    : 'post',
                    url     : '{{ route('laporan-surat') }}',
                    data    : {
                        '_token'    : '{{ csrf_token() }}',
                        'tgl1'      : $('#tgl1').val(),
                        'tgl2'      : $('#tgl2').val()
                    },
                    success : function () {
                        $('#laporan-surat').modal('show');
                    },
                    error   : function (e) {
                        console.log(e.responseText);
                    }
                });
            }
        });

        $('#laporan-surat').on('show.bs.modal', function () {
            $('#tgl1').val('');
            $('#tgl2').val('');
            $('.surat').html('<iframe src="{{ route('data-surat') }}" width="100%" height="470px"></iframe>');
        });
    });
</script>
@endpush