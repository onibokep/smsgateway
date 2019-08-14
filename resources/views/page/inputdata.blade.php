@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Input Data</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Form Data Penduduk</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <form class="form-horizontal" action="{{ route('penduduk.store') }}" method="post" id="form-penduduk">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-sm-2">NIK : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <div>
                                        <input type="text" class="form-control" name="nik_penduduk" id="nik_penduduk" maxlength="16">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="nama_penduduk" id="nama_penduduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tempat lahir : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="tmlahir_penduduk" id="tmlahir_penduduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tanggal lahir : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <div id="tgl-lahir">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="tglahir_penduduk" id="tglahir_penduduk"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Jenis Kelamin : </label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" id="jk_penduduk" name="jk_penduduk" value="Laki-laki" class="flat"> Laki-laki
                                    </label>
                                    <label>
                                        <input type="radio" id="jk_penduduk" name="jk_penduduk" value="Perempuan" class="flat"> Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Status : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <select class="form-control" name="status_penduduk" id="status_penduduk">
                                        <option value="">--Pilih--</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Agama : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    {{--<input type="text" class="form-control" name="agama_penduduk" id="agama_penduduk" style="width: 30%" required>--}}
                                    <select class="form-control"  name="agama_penduduk" id="agama_penduduk" required>
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
                                    <input type="number" class="form-control" name="telp_penduduk" id="telp_penduduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Pekerjaan : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_penduduk" id="pekerjaan_penduduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kewarganegaraan : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="kwn_penduduk" id="kwn_penduduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Alamat : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <textarea name="alm_penduduk" id="alm_penduduk" cols="" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Rt / Rw : </label>
                                <div class="col-sm-4 col-lg-2">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="form-control" name="rt_penduduk" id="rt_penduduk">
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
                                            <select class="form-control" name="rw_penduduk" id="rw_penduduk">
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
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Desa : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="desa" id="desa" value="Sukamanah" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kecamatan : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="Rajeg" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kabupaten : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="Tangerang" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Provinsi : </label>
                                <div class="col-lg-3 col-md-5 col-sm-10">
                                    <input type="text" class="form-control" name="provinsi" id="provinsi" value="Banten" readonly>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-sm btn-dark btn-fa5 pull-right" id="submit-penduduk">
                                    <i class="fa fa-file-text"></i> &nbsp; Simpan Data
                                </button>
                                <button class="btn btn-sm btn-dark btn-fa5 pull-right" type="reset">
                                    <i class="fa fa-circle"></i> &nbsp; Reset
                                </button>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-6"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
<script>
    $(document).ready(function(){
        $(function () {
            $('#tgl-lahir .input-group.date').datepicker({
                language: "id",
                orientation: "bottom auto",
                autoclose: true,
                format: "dd-mm-yyyy",
            });
        });

        $('#submit-penduduk').click(function (e) {
            e.preventDefault();
            if ($('#nik_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'NIK harus diisi !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if (!$.isNumeric($('#nik_penduduk').val())) {
                $.alert({
                    title: 'Peringatan',
                    content: 'NIK harus angka !!',
                    type: 'red',
                    icon: 'fa fa-warning',
                    theme   : 'material',
                    buttons: {
                        ok: {
                            btnClass: 'btn-danger',
                        }
                    }
                });
            }else if ($('#nik_penduduk').val().length < 16) {
                $.alert({
                    title: 'Peringatan',
                    content: 'NIK tidak lengkap !',
                    type: 'red',
                    icon: 'fa fa-warning',
                    theme   : 'material',
                    buttons: {
                        ok: {
                            btnClass: 'btn-danger',
                        }
                    }
                });
            }else if ($('#nama_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Nama harus diisi lengkap !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#tmlahir_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Tempat lahir harus diisi !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#tglahir_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Tanggal lahir harus diisi !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if (!$('input:radio[name=jk_penduduk]:checked').val()){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Jenis kelamin harus dipilih !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#status_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Status perkawinan harus dipilih !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#agama_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Agama belum dipilih !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#telp_penduduk').val() == '') {
                $.alert({
                    title: 'Peringatan',
                    content: 'Nomor telpon wajib diisi, pribadi atau keluarga !',
                    type: 'red',
                    icon: 'fa fa-warning',
                    theme   : 'material',
                    buttons: {
                        ok: {
                            btnClass: 'btn-danger',
                        }
                    }
                });
//            }else if ($('#pekerjaan_penduduk').val() == ''){
//                $.alert({
//                    title   : 'Peringatan',
//                    content : 'Pekerjaan harus diisi !!',
//                    type    : 'red',
//                    icon    : 'fa fa-warning',
//                    buttons : {
//                        ok  : {
//                            btnClass    : 'btn-danger',
//                        }
//                    }
//                });
            }else if ($('#kwn_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Kewarganegaaraan harus diisi, e.g "WNI"',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#alm_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'Alamat harus diisi !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#rt_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'RT harus dipilih !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
                    buttons : {
                        ok  : {
                            btnClass    : 'btn-danger',
                        }
                    }
                });
            }else if ($('#rw_penduduk').val() == ''){
                $.alert({
                    title   : 'Peringatan',
                    content : 'RW harus dipilih !!',
                    type    : 'red',
                    icon    : 'fa fa-warning',
                    theme   : 'material',
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
                    url     : '{{ route('penduduk.store') }}',
                    data    : {
                        '_token'        : '{{ csrf_token() }}',
                        'nik'           : $('#nik_penduduk').val(),
                        'nama'          : $('#nama_penduduk').val(),
                        'tmlahir'       : $('#tmlahir_penduduk').val(),
                        'tglahir'       : $('#tglahir_penduduk').val(),
                        'kelamin'       : $('#jk_penduduk').val(),
                        'status'        : $('#status_penduduk').val(),
                        'agama'         : $('#agama_penduduk').val(),
                        'telp'          : $('#telp_penduduk').val(),
                        'pekerjaan'     : $('#pekerjaan_penduduk').val(),
                        'kwn'           : $('#kwn_penduduk').val(),
                        'alamat'        : $('#alm_penduduk').val(),
                        'rt'            : $('#rt_penduduk').val(),
                        'rw'            : $('#rw_penduduk').val(),
                        'desa'          : $('#desa').val(),
                        'kecamatan'     : $('#kecamatan').val(),
                        'kabupaten'     : $('#kabupaten').val(),
                        'provinsi'      : $('#provinsi').val(),
                    },
                    success : function (data) {
                        $.alert({
                            icon    : 'fa fa-handshake-o',
                            theme   : 'modern',
                            title   : 'Sukses',
                            content : 'Data '+data.nik+' telah tersimpan',
                            type    : 'blue',
                            buttons : {
                                ok  : {
                                    btnClass    : 'btn-info',
                                    action      : function () {
                                        $('#form-penduduk').trigger('reset');
                                    }
                                }
                            }
                        });
                    },
                    error   : function (e) {
                        $.alert({
                            type    : 'red',
                            title   : 'Error',
                            content : e.responseText,
                            closeIcon   : true,
                            boxWidth    : '80%',
                            useBootstrap    : false,
                        });
                        console.log(e.responseText);
                    }
                });
            }
        });
    });
</script>

@endpush
