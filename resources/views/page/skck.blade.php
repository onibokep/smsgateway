@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Surat Pengantar</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Surat Pengantar SKCK</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#warga" style="color: #73879C;" id="panel-skck"><i class="fa fa-file-text"></i></a>
                                </h4>
                            </div>
                            <div id="warga" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="{{ url('/storeskck') }}" method="post" id="skck-fr">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">NIK : </label>
                                            <div class="col-sm-3">
                                                <div>
                                                    <input type="text" class="form-control" name="nik" id="nik-skck"  readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <a href="#modal-cari-penduduk" data-toggle="modal" class="cari-penduduk btn btn-sm btn-dark" id="btn-cari-penduduk">
                                                    <i class="fa fa-search"></i> Cari
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nama : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama-skck" id="nama-skck" style="width: 30%" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nomor Surat : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nomorSurat" id="nomor-skck" style="width: 30%" value="{{ old('nomorSurat') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <button data-toggle="modal" class="btn btn-sm btn-dark btn-fa5 pull-right" id="buat-skck">
                                                <i class="fa fa-file-text"></i> &nbsp; Buat Surat
                                            </button>
                                            <button class="btn btn-sm btn-dark btn-fa5 pull-right" type="reset">
                                                <i class="fa fa-circle"></i> &nbsp; Reset
                                            </button>
                                        </div>
                                        <div class="col-sm-7"></div>
                                    </form>
                                    <input type="hidden" name="_token2" value="{{ csrf_token() }}">
                                </div>
                                <div class="panel-footer"><i class="fa fa-github-alt"></i>&nbsp; SMS Gateway</div>
                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-cari-penduduk" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cari Data Penduduk</h4>
                </div>
                <div class="modal-body">
                    <div class="kontak"></div>
                    <table class="table table-striped" cellspacing="0" width="100%" id="table-cari-penduduk">
                        <thead>
                        <tr>
                            <th style="width: 5%">Pilih</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat/Tgl lahir</th>
                            <th>Alamat</th>
                            <th>Rt/Rw</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>
                                    <a class="p-penduduk" data-id="{{ $d->nik }}" data-nama="{{ $d->nama }}"><i class="fa fa-check"></i> </a>
                                </td>
                                <td>{{ $d->nik }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->tmlahir.', '.$d->tglahir }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->rt.'/'.$d->rw }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-skck" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    <h4 class="modal-title">Preview Pengantar SKCK</h4>
                </div>
                <div class="modal-body">
                    <div class="skck"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
    <script>
        $(document).ready(function () {
            $('.p-penduduk').click(function () {
                $('#nik-skck').val($(this).data('id'));
                $('#nama-skck').val($(this).data('nama'));
                $('#modal-cari-penduduk').modal('hide');
            });
            $('#modal-cari-penduduk').on('show.bs.modal', function () {
                $('#nik-skck').val('');
                $('#nama-skck').val('');
            });
            $('#table-cari-penduduk').DataTable();
            $('#buat-skck').click(function (e) {
                e.preventDefault();
                if ($('#nik-skck').val() == '' || $('#nama-skck').val()=='' || $('#nomor-skck').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Isian belum lengkap !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else {
                    $('#modal-skck').modal('show');
                }
            });
            $('#modal-skck').on('show.bs.modal', function () {
                $.ajax({
                    type    : 'post',
                    url     : '{{ route('getskck') }}',
                    data    : {
                        '_token'        : $('input[name=_token]').val(),
                        'nik'           : $('#nik-skck').val(),
                        'nomorSurat'    : $('#nomor-skck').val(),
                    },
                    success: function (data) {
                        $('.skck').html('<iframe src="{{ route('pskck') }}" width="100%" height="470px"></iframe>');
                        $('#skck-fr').trigger('reset');
                    },
                    error : function (e) {
                        console.log(e.responseText);
                    }
                });
            });
        });
    </script>
@endpush