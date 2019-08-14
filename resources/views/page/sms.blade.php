@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tulis Pesan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Form Tulis Pesan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#personal" style="color: #73879C;" id="panel-personal"><i class="fa fa-male"></i>  &nbsp;Kirim pesan personal</a>
                                </h4>
                            </div>
                            <div id="personal" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="col-sm-6">
                                        <form class="form-horizontal" id="smsPersonal-form" action="{{ route('sms.store') }}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="creatorID" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" id="creatorID">
                                            <div class="item form-group{{ $errors->has('tujuan') ? ' has-error' : '' }}">
                                                <label class="control-label col-sm-3">Kepada </label>
                                                <div class="col-md-5 col-sm-5 col-xs-12">
                                                    <input id="tujuan" type="text" class="form-control col-md-7 col-xs-12" name="tujuan" value="{{ old('tujuan') }}" required autofocus>
                                                    @if ($errors->has('tujuan'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('tujuan') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <a href="#cari-kontak" class="btn btn-sm btn-primary kontak-personal" data-toggle="modal"><i class="fa fa-search"></i> &nbsp;Cari</a>
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('teks') ? ' has-error' : '' }}">
                                                <label class="control-label col-sm-3">Teks</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="teks" id="teks" rows="4"></textarea>
                                                    @if ($errors->has('teks'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('teks') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <button id="kirim-personal" type="submit" class="btn btn-dark btn-md pull-right"><i class="fa fa-rocket"></i> Kirim</button>
                                                <a id="tutup-personal" class="btn btn-dark btn-md pull-right"><i class="fa fa-close"></i> Tutup</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <div class="panel-footer"><i class="fa fa-github-alt"></i>&nbsp; SMS Gateway</div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#broadcast" style="color: #73879C;"><i class="fa fa-bullhorn"></i>   &nbsp;Kirim Pesan Broadcast</a>
                                </h4>
                            </div>
                            <div id="broadcast" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="col-sm-6">
                                        <form class="form-horizontal" id="sms-grup" action="{{ route('smsgrup') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="item form-group">
                                                <label class="control-label col-sm-3">Grup Rt /Rw </label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select name="rt_sms" id="rt-sms" class="form-control col-md-7 col-xs-12">
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
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select name="rw_sms" id="rw-sms" class="form-control col-md-7 col-xs-12">
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
                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Teks</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="teks_grup" id="teks-grup" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="pesan-broadcast" class="btn btn-dark btn-md pull-right"><i class="fa fa-rocket"></i> Kirim</button>
                                                <a id="tutup-broadcast" class="btn btn-dark btn-md pull-right"><i class="fa fa-close"></i> Tutup</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                                <div class="panel-footer"><i class="fa fa-github-alt"></i>&nbsp; SMS Gateway</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cari-kontak" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cari kontak</h4>
                </div>
                <div class="modal-body">
                    <div class="kontak"></div>
                    <table class="table table-striped" cellspacing="0" width="100%" id="table-kontak">
                        <thead>
                        <tr>
                            <th></th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Telp / HP</th>
                            <th>Alamat</th>
                            <th>Rt / Rw</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>
                                    <a data-id="{{ $d->telp }}" class="tujuan-sms"><i class="fa fa-check"></i> </a>
                                </td>
                                <td>{{ $d->nik }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->telp }}</td>
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
@stop
@push('script')
    <script>
        $(document).on('click', '.tujuan-sms', function () {
            $('#tujuan').val($(this).data('id'));
            $('#cari-kontak').modal('hide');
        });
        $(document).ready(function(){
           $('#cari-kontak').on('show.bs.modal', function () {
               $('#tujuan').val('');
           });
           $('#tutup-personal').on('click', function (e) {
              $('#personal').collapse('hide');
              $('#broadcast').collapse('show');
           });
            $('#tutup-broadcast').on('click', function (e) {
                $('#personal').collapse('show');
                $('#broadcast').collapse('hide');
            });
           $('#personal').on('hide.bs.collapse', function () {
               $('#tujuan').val('');
               $('#teks').val('');
               $('.help-block').hide();
           });
           //sms personal
            $('#kirim-personal').click(function(e){
                e.preventDefault();
                if ($('#tujuan').val() != '' && $('#teks').val() != '') {
                    var url = $('#smsPersonal-form').attr('action');

                    $.ajax({
                        type: 'post',
                        url: '{{ route('sms.store') }}',
                        data: {
                            '_token'    : $('input[name=_token]').val(),
                            'tujuan'    : $('#tujuan').val(),
                            'teks'      : $('#teks').val(),
                            'creatorID' : $('input[name=creatorID]').val(),
                        },
                        success: function(data){
                            $.alert({
                                icon: 'fa fa-spinner fa-spin',
                                title: 'Mengirim',
                                content: 'Sedang mengirim pesan .....',
                                type: 'blue',
                                typeAnimated: true,
                                autoClose: 'ok|2000',
                                buttons: {
                                    ok: {
                                        action: function(){

                                        }
                                    }
                                }
                            });
                            $('#tujuan').val('');
                            $('#teks').val('');
                        }
                    });
                }else {
                    $.alert({
                        type    : 'red',
                        theme   : 'modern',
                        closeAnimation : 'zoom',
                        title   : 'Peringatan',
                        icon    : 'fa fa-hand-stop-o',
                        content : 'Nomor tujuan dan pesan harus diisi !',
                        buttons : {
                            ok   : {
                                btnClass : 'btn-red',
                            }
                        }
                    });
                }
            });
            $('#table-kontak').DataTable();
            // sms grup
            $('#pesan-broadcast').click(function (e) {
                e.preventDefault();
                if ($('#rt-sms').val() != '' && $('#rw-sms').val() != '' && $('#teks-grup').val() != '') {
                    $.ajax({
                        type: 'post',
                        url: '{{ route('smsgrup') }}',
                        data: {
                            '_token'    : '{{ csrf_token() }}',
                            'rt'        : $('#rt-sms').val(),
                            'rw'        : $('#rw-sms').val(),
                            'teks'      : $('#teks-grup').val()
                        },
                        success: function(data){
                            $.alert({
                                icon: 'fa fa-spinner fa-spin',
                                title: 'Mengirim',
                                content: 'Sedang mengirim pesan .....',
                                type: 'blue',
                                typeAnimated: true,
                                autoClose: 'ok|2000',
                                buttons: {
                                    ok: {
                                        action: function(){

                                        }
                                    }
                                }
                            });
                            $('#sms-grup').trigger('reset');
                        },
                        error   :function (e) {
                            console.log(e.responseText);
                        }
                    });
                }else {
                    $.alert({
                        type    : 'orange',
                        title   : 'Peringatan',
                        theme   : 'modern',
                        animation : 'scale',
                        closeAnimation : 'scaleX',
                        icon    : 'fa fa-hand-stop-o',
                        content : 'Grup tujuan dan pesan harus diisi !'
                    });
                }
            });
        });
    </script>
@endpush
