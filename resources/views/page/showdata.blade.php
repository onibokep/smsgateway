@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lihat Data</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Lihat Data Penduduk</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="">
                        <table class="table table-striped" id="data-penduduk" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat/Tgl. Lahir</th>
                                <th>Alamat</th>
                                <th>RT / RW</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($penduduk as $d)
                                <tr>
                                    <td>{{ $d->nik }}</td>
                                    <td>{{ ucfirst($d->nama) }}</td>
                                    <td>
                                        @php
                                            $date = new DateTime($d->tglahir);
                                            $tgl = $date->format('d-m-Y');
                                            echo ucfirst($d->tmlahir).', '.$tgl;
                                        @endphp
                                    </td>
                                    <td>{{ ucfirst($d->alamat) }}</td>
                                    <td>{{ '0'.$d->rt."/0".$d->rw}}</td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td>
                                        <a class="detail-penduduk" data-toggle="tooltip" data-title="Detail" data-id="{{ $d->nik }}"><i class="fa fa-file"></i> </a>
                                        ||
                                        <a class="edit-penduduk" data-toggle="tooltip" data-title="Edit" data-id="{{ $d->nik }}"><i class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pendudukDetail" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail Penduduk</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><p>Nik</p></td>
                                <td><p> : </p></td>
                                <td><p class="nik-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Nama</p></td>
                                <td><p> : </p></td>
                                <td><p class="nama-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Tempat/ Tgl. lahir</p></td>
                                <td><p> : </p></td>
                                <td><p class="ttl-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Jenis Kelamin</p></td>
                                <td><p> : </p></td>
                                <td><p class="jk-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Status</p></td>
                                <td><p> : </p></td>
                                <td><p class="status-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Agama</p></td>
                                <td><p> : </p></td>
                                <td><p class="agama-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Telp</p></td>
                                <td><p> : </p></td>
                                <td><p class="telp-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Pekerjaan</p></td>
                                <td><p> : </p></td>
                                <td><p class="pekerjaan-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Kewarganegaraan</p></td>
                                <td><p> : </p></td>
                                <td><p class="kwn-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Alamat</p></td>
                                <td><p> : </p></td>
                                <td><p class="alamat-detail"></p></td>
                            </tr>
                            <tr>
                                <td><p>Keterangan</p></td>
                                <td><p> : </p></td>
                                <td><p class="keterangan-detail"></p></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pendudukEdit" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Penduduk</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="" method="">
                            <input type="hidden" name="_tokenE" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-sm-3">NIK : </label>
                                <div class="col-sm-9">
                                    <div>
                                        <input type="text" class="form-control nik-edit" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Nama : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama-edit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Tempat lahir : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tmlahir-edit" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Tanggal lahir : </label>
                                <div class="col-sm-9">
                                    <div id="tgl-lahir">
                                        <div class="input-group date" >
                                            <input type="text" class="form-control" id="tglahir-edit"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kelamin : </label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="jk-edit" style="width: 50%">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Status : </label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="status-edit" style="width: 50%">
                                        <option value="">--Pilih--</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Agama : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control agama-edit" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Telp : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="telp-edit" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Pekerjaan : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaan-edit" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kewarganegaraan : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kwn-edit" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Alamat : </label>
                                <div class="col-sm-9">
                                    <textarea id="alm-edit" cols="" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Rt / Rw : </label>
                                <div class="col-md-9 col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="form-control" id="rt-edit">
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
                                            <select class="form-control" id="rw-edit">
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
                                <label class="control-label col-sm-3">Desa : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="desa"  value="Sukamanah" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kecamatan : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan"  value="Rajeg" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kabupaten : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="kabupaten" id="kabupaten"  value="Tangerang" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Provinsi : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="provinsi" id="provinsi"  value="Banten" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Keterangan : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control keterangan" name="keterangan" id="keterangan">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-window-close"></i> Keluar</button>
                            <button type="button" class="btn btn-primary update-penduduk"><i class="fa fa-refresh"></i> Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
<script>
    $(document).ready(function () {
        $('#data-penduduk').DataTable();

        $('.detail-penduduk').click(function () {
            $('.nik-detail').text($(this).data('id'));
            $.ajax({
                type    : 'post',
                url     : '{{ route('editP') }}',
                data    : {
                    '_token'    : '{{ csrf_token() }}',
                    'nik'       : $(this).data('id'),
                },
                success :function (data) {
                    $('.nama-detail').text(data.nama);
                    $('.ttl-detail').text(data.tmlahir+', '+data.tglahir);
                    $('.jk-detail').text(data.kelamin);
                    $('.status-detail').text(data.status);
                    $('.agama-detail').text(data.agama);
                    $('.telp-detail').text(data.telp);
                    $('.pekerjaan-detail').text(data.pekerjaan);
                    $('.kwn-detail').text(data.kwn);
                    $('.alamat-detail').text(data.alamat+', Rt/Rw. 0'+data.rt+'/0'+data.rw+', Ds.'+data.desa+', Kec.'+data.kecamatan+', Kab.'+data.kabupaten+'-'+data.provinsi);
                    $('.keterangan-detail').text(data.keterangan);

                    $('#pendudukDetail').modal('show');
                },
                error   :function (e) {
                    console.log(e.responseText);
                }
            });

        });

        $('.edit-penduduk').click(function () {
            $('.nik-edit').val($(this).data('id'));
            $.ajax({
                type    : 'post',
                url     : '{{ route('editP') }}',
                data    : {
                    '_token'    : '{{ csrf_token() }}',
                    'nik'       : $('.nik-edit').val(),
                },
                success : function (data) {
                    $('#nama-edit').val(data.nama);
                    $('#tmlahir-edit').val(data.tmlahir);
                    $('#tglahir-edit').val(data.tglahir);
                    $('#jk-edit').val(data.kelamin);
                    $('#status-edit').val(data.status);
                    $('#telp-edit').val(data.telp);
                    $('.agama-edit').val(data.agama);
                    $('#pekerjaan-edit').val(data.pekerjaan);
                    $('#kwn-edit').val(data.kwn);
                    $('#alm-edit').val(data.alamat);
                    $('#rt-edit').val(data.rt);
                    $('#rw-edit').val(data.rw);
                    $('.keterangan').val(data.keterangan);
                    $('#pendudukEdit').modal('show');
                },
                error   : function (e) {
                    console.log(e.responseText);
                }
            });
        });

        $('.update-penduduk').click(function () {
            $.ajax({
                type    : 'post',
                url     : '{{ route('updatep') }}',
                data    : {
                    '_token'        : '{{ csrf_token() }}',
                    'nik'           : $('.nik-edit').val(),
                    'nama'          : $('#nama-edit').val(),
                    'tmlahir'       : $('#tmlahir-edit').val(),
                    'tglahir'       : $('#tglahir-edit').val(),
                    'kelamin'       : $('#jk-edit').val(),
                    'status'        : $('#status-edit').val(),
                    'agama'         : $('.agama-edit').val(),
                    'telp'          : $('#telp-edit').val(),
                    'pekerjaan'     : $('#pekerjaan-edit').val(),
                    'kwn'           : $('#kwn-edit').val(),
                    'alamat'        : $('#alm-edit').val(),
                    'rt'            : $('#rt-edit').val(),
                    'rw'            : $('#rw-edit').val(),
                    'desa'          : $('#desa').val(),
                    'kecamatan'     : $('#kecamatan').val(),
                    'kabupaten'     : $('#kabupaten').val(),
                    'provinsi'      : $('#provinsi').val(),
                    'keterangan'    : $('#keterangan').val(),
                },
                success : function (data) {
                    $('#pendudukEdit').modal('hide');
                    $.alert({
                        type    : 'blue',
                        title   : 'Sukses',
                        icon    : 'fa fa fa-handshake-o',
                        content : 'Data penduduk berhasil di update.',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-primary',
                                action      : function () {
                                    location.reload(true);
                                }
                            }
                        }
                    });
                },
                error   : function (e) {
                    //
                }
            });
        });

        $(function () {
            $('.input-group.date').datepicker({
                language: "id",
                orientation: "bottom auto",
                autoclose: true
            });
        });
    });
</script>
@endpush