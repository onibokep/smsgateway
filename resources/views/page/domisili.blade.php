@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Surat Keterangan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Surat Keterangan Domisili</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#warga" style="color: #73879C;" id="panel-warga"><i class="fa fa-male"></i>  &nbsp;Warga</a>
                                </h4>
                            </div>
                            <div id="warga" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="{{ route('simpandomisili') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">NIK : </label>
                                            <div class="col-lg-3 col-md-4 col-sm-5">
                                                <div>
                                                    <input type="text" class="form-control" name="nik" id="nik-domisili"  readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <a href="#modal-cari-penduduk" data-toggle="modal" class="cari-penduduk btn btn-sm btn-dark" id="btn-cari-penduduk">
                                                    <i class="fa fa-search"></i> Cari
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nama : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="nama-skck" id="nama-domisili"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nomor Surat : </label>
                                            <div class="col-lg-3 col-md-4 col-sm-10">
                                                <input type="text" class="form-control" name="nomorSurat" id="nomor-domisili" value="{{ old('nomorSurat') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <button data-toggle="modal" class="btn btn-sm btn-dark btn-fa5 pull-right" id="buat-domisili">
                                                <i class="fa fa-file-text"></i> &nbsp; Buat Surat
                                            </button>
                                            <button class="btn btn-sm btn-dark btn-fa5 pull-right" type="reset">
                                                <i class="fa fa-circle"></i> &nbsp; Reset
                                            </button>
                                        </div>
                                        <div class="col-sm-7"></div>
                                    </form>
                                </div>
                                <div class="panel-footer"><i class="fa fa-github-alt"></i>&nbsp; SMS Gateway</div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#pendatang" style="color: #73879C;" id="panel-pendatang"><i class="fa fa-grav"></i>   &nbsp;Pendatang</a>
                                </h4>
                            </div>
                            <div id="pendatang" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="{{ route('dom2') }}" method="post" id="form-pendatang">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nomor Surat : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="nomor_dom" id="nomor-dom" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">NIK : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <div>
                                                    <input type="text" class="form-control" name="nik_dom" id="nik-dom" required maxlength="16">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nama : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="nama_dom" id="nama-dom" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Tempat lahir : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="tl_dom" id="tl-dom" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Tanggal lahir : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <div id="tgl-lahir">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" name="tgl_dom" id="tgl-dom" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Jenis Kelamin : </label>
                                            <div class="col-sm-10">
                                                <label>
                                                    <input type="radio" id="jk-dom" name="jk_dom" value="Laki-laki" class="flat"> Laki-laki
                                                </label>
                                                <label>
                                                    <input type="radio" id="jk-dom" name="jk_dom" value="Perempuan" class="flat"> Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Status : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <select class="form-control" name="status_dom" id="status-dom">
                                                    <option value="">--Pilih--</option>
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Agama : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                {{--<input type="text" class="form-control" name="agama_dom" id="agama-dom" style="width: 30%" required>--}}
                                                <select class="form-control"  name="agama_dom" id="agama_dom" required>
                                                    <option value="">--Pilih--</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="aliran kepercayaan">Aliran Kepercayaan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Telp : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="telp_dom" id="telp-dom" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Pekerjaan : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="pekerjaan_dom" id="pekerjaan-dom" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Kewarganegaraan : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="kwn_dom" id="kwn-dom" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Alamat : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <textarea name="alm_dom" id="alm-dom" cols="" rows="3" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Rt / Rw : </label>
                                            <div class="col-sm-4 col-lg-2">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="rt_dom" id="rt-dom">
                                                            <option value="">--</option>
                                                            @for($i=1;$i<=10;$i++)
                                                                <option value="{{ $i }}">
                                                                    @if(strlen($i)==1)
                                                                        {{ '0'.$i }}
                                                                    @else
                                                                        {{ $i }}
                                                                    @endif
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="rw_dom" id="rw-dom">
                                                            <option value="">--</option>
                                                            @for($i=1;$i<=15;$i++)
                                                                <option value="{{ $i }}">
                                                                    @if(strlen($i)==1)
                                                                        {{ '0'.$i }}
                                                                    @else
                                                                        {{ $i }}
                                                                    @endif
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Desa : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="desa_dom" id="desa-dom" value="Sukamanah" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Kecamatan : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="kecamatan_dom" id="kecamatan-dom" value="Rajeg" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Kabupaten : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="kabupaten_dom" id="kabupaten-dom" value="Tangerang" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Provinsi : </label>
                                            <div class="col-lg-3 col-md-5 col-sm-10">
                                                <input type="text" class="form-control" name="provinsi_dom" id="provinsi-dom" value="Banten" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6">
                                            <button type="submit" class="btn btn-sm btn-dark btn-fa5 pull-right" id="buat-dom-2">
                                                <i class="fa fa-file-text"></i> &nbsp; Buat Surat
                                            </button>
                                            <button class="btn btn-sm btn-dark btn-fa5 pull-right" type="reset">
                                                <i class="fa fa-circle"></i> &nbsp; Reset
                                            </button>
                                        </div>
                                        <div class="col-lg-7 col-md-6 col-sm-6"></div>
                                    </form>
                                </div>
                                <div class="panel-footer"><i class="fa fa-github-alt"></i>&nbsp; SMS Gateway</div>
                            </div>
                        </div>
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-domisili" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Preview Keterangan Domisili</h4>
                </div>
                <div class="modal-body">
                    <div class="domisili"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-domisili-2" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Preview Keterangan Domisili</h4>
                </div>
                <div class="modal-body">
                    <div class="domisili-2"></div>
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

        $(document).ready(function(){

            $('.p-penduduk').click(function () {
                $('#nik-domisili').val($(this).data('id'));
                $('#nama-domisili').val($(this).data('nama'));
                $('#modal-cari-penduduk').modal('hide');
            });

            $('#warga').on('show.bs.collapse', function (e) {
              $('#pendatang').collapse('hide');
            });

            $('#pendatang').on('show.bs.collapse', function (e) {
              $('#warga').collapse('hide');
            });

            $('#table-cari-penduduk').DataTable();

            $('#buat-domisili').click(function (e) {
                e.preventDefault();
                if ($('#nik-domisili').val() == '' || $('#nama-domisili').val()=='' || $('#nomor-domisili').val() == ''){
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
                    $('#modal-domisili').modal('show');
                }
            });

            $('#modal-domisili').on('show.bs.modal', function () {
                $.ajax({
                    type    : 'post',
                    url     : '{{ URL::asset('/keterangandomisili') }}',
                    data    : {
                        '_token': $('input[name=_token]').val(),
                        'nik'   : $('#nik-domisili').val(),
                        'nomorSurat' : $('#nomor-domisili').val(),
                    },
                    success: function (data) {
                        $('.domisili').html('<iframe src="{{ route('pdomisili') }}" width="100%" height="470px"></iframe>');
                        $('#nik-domisili').val('');
                        $('#nomor-domisili').val('');
                        $('#nama-domisili').val('');
                    }
                });
            });

            /*
            form domisili pendatang
             */

            $('#buat-dom-2').click(function (e) {
                e.preventDefault();
                if ($('#nomor-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Nomor Surat harus diisi !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#nik-dom').val() == '' ){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'NIK harus diisi !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                } else if (!$.isNumeric($('#nik-dom').val())){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'NIK bukan angka !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                } else if ($('#nik-dom').val().length < 16){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'NIK tidak lengkap !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                } else if ($('#nama-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Nama harus diisi lengkap !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#tl-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Tempat lahir harus diisi !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#tgl-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Tanggal lahir harus diisi !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if (!$('input:radio[name=jk_dom]:checked').val()){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Jenis kelamin harus dipilih !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#status-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Status perkawinan harus dipilih !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#agama-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Agama harus diisi !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#telp-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Nomor telpon harus diisi !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
//                }else if ($('#pekerjaan-dom').val() == ''){
//                    $.alert({
//                        title   : 'Peringatan',
//                        content : 'Pekerjaan harus diisi !!',
//                        type    : 'red',
//                        icon    : 'fa fa-warning',
//                        buttons : {
//                            ok  : {
//                                btnClass    : 'btn-danger',
//                            }
//                        }
//                    });
                }else if ($('#kwn-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Kewarganegaaraan harus diisi, e.g "WNI"',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#alm-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'Alamat harus diisi !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#rt-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'RT harus dipilih !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }else if ($('#rw-dom').val() == ''){
                    $.alert({
                        title   : 'Peringatan',
                        content : 'RW harus dipilih !!',
                        type    : 'red',
                        icon    : 'fa fa-warning',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-danger',
                            }
                        }
                    });
                }
                else {
                    $.ajax({
                        type    : 'post',
                        url     : '{{ route('dom2') }}',
                        data    : {
                            '_token'        : $('input[name=_token]').val(),
                            'nomorSurat'    : $('#nomor-dom').val(),
                            'nik'           : $('#nik-dom').val(),
                            'nama'          : $('#nama-dom').val(),
                            'tmlahir'       : $('#tl-dom').val(),
                            'tglahir'       : $('#tgl-dom').val(),
                            'kelamin'       : $('#jk-dom').val(),
                            'status'        : $('#status-dom').val(),
                            'agama'         : $('#agama-dom').val(),
                            'telp'          : $('#telp-dom').val(),
                            'pekerjaan'     : $('#pekerjaan-dom').val(),
                            'kwn'           : $('#kwn-dom').val(),
                            'alamat'        : $('#alm-dom').val(),
                            'rt'            : $('#rt-dom').val(),
                            'rw'            : $('#rw-dom').val(),
                            'desa'          : $('#desa-dom').val(),
                            'kecamatan'     : $('#kecamatan-dom').val(),
                            'kabupaten'     : $('#kabupaten-dom').val(),
                            'provinsi'      : $('#provinsi-dom').val(),
                        },
                        success : function (data) {
                            $('#modal-domisili-2').modal('show');
                        }
                    });
                }
            });

            $('#modal-domisili-2').on('show.bs.modal', function () {
                $('.domisili-2').html('<iframe src="{{ route('pdomisili2') }}" width="100%" height="470px"></iframe>');
                $('#form-pendatang').trigger('reset');
            });

            $(function () {
                $('#tgl-lahir .input-group.date').datepicker({
                    language: "id",
                    orientation: "bottom auto",
                    autoclose: true,
                    format: "dd-mm-yyyy",
                });
            });
        });
    </script>

@endpush
