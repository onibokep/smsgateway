@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kotak Masuk</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Semua Pesan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped inbox" id="inbox" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                {{--<th></th>--}}
                                <th>Waktu</th>
                                <th>Pengirim</th>
                                <th style="width: 50%">Pesan</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($box as $d)
                                <tr class="item{{ $d->ID }}">
                                    {{--@if($d->Processed == "true")--}}
                                        {{--<td><i class="fa fa-envelope-open"></i> </td>--}}
                                    {{--@elseif($d->Processed == "false")--}}
                                        {{--<td><i class="fa fa-envelope"></i> </td>--}}
                                    {{--@endif--}}
                                    <td>{{ $d->ReceivingDateTime }}</td>
                                    <td>{{ $d->SenderNumber }}</td>
                                    <td>{{ $d->TextDecoded }}</td>
                                    <td>
                                        {{--<a data-toggle="tooltip" title="balas" class="reply-pesan" data-nope="{{ $d->SenderNumber }}"> <i class="fa fa-comments-o"></i> </a> ||--}}
                                        <a class="btn-delete-modal" data-id="{{ $d->ID }}" data-nope="{{ $d->SenderNumber }}" data-toggle="tooltip" title="hapus"><i class="fa fa-trash"></i> </a>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="confirm-outbox" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-warning"></i> Konfirmasi Hapus Pesan</h4>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan menghapus pesan dari <span class="nope"></span> ? </p>
                    <span class="hidden id"></span>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i> Keluar</button>
                        <button class="btn btn-primary btn-delete" data-dismiss="modal"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="modal fade " id="modal-reply" role="dialog" aria-hidden="true" tabindex="-1">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title"><i class="fa fa-comments"></i> Balas Pesan <span class="nope"></span></h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<form class="form-horizontal">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-sm-2">Ke :</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<input class="form-control" id="tujuan-reply" readonly>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-sm-2">Pesan :</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<textarea class="form-control" id="teks-reply"></textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<div class="btn-group">--}}
                        {{--<button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i> Keluar</button>--}}
                        {{--<button class="btn btn-primary btn-balas" data-dismiss="modal"><i class="fa fa-telegram"></i> Kirim</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@stop
@push('script')
<script>
    $(document).ready(function () {
        $('.btn-delete-modal').click(function () {
            $('.nope').text($(this).data('nope'));
            $('.id').text($(this).data('id'));
            $('#confirm-outbox').modal('show');
        });

        $('.reply-pesan').click(function () {
            $('.nope').text($(this).data('nope'));
            $('.id').text($(this).data('id'));
            $('#tujuan-reply').val($(this).data('nope'));
            $('#modal-reply').modal('show');
        });

        $('.btn-balas').click(function () {
            $.ajax({
                type    : 'post',
                url     : '{{ route('balas') }}',
                data    : {
                    '_token'    : '{{ csrf_token() }}',
                    'tujuan'    : $('#tujuan-reply').val(),
                    'teks'      : $('#teks-reply').val(),
                    'creatorID' : '{{ \Illuminate\Support\Facades\Auth::user()->id }}'
                },
                success : function (data) {
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
                },
                error   : function (e) {
                    console.log(e.responseText);
                }
            });
        });

        $('.btn-delete').click(function (e) {
            $.ajax({
                type    : 'post',
                url     : '{{ route('dropinbox') }}',
                data    : {
                    '_token'    : $('input[name=_token]').val(),
                    'id'        : $('.id').text()
                },
                success : function (data) {
                    $('.item' + $('.id').text()).remove();
                }
            });
        });
        $('#inbox').DataTable({
            'order' : [[1, 'desc']]
        });

    });
</script>
@endpush
