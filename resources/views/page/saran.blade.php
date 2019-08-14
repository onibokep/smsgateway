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
                        <h2>Saran</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <table class="table table-striped" id="saran-tb" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width: 15%">Waktu</th>
                                <th style="width: 15%">Pengirim</th>
                                <th style="width: 65%">Pesan</th>
                                <th style="width: 5%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($box as $inbox)
                                <tr>
                                    <td>{{ $inbox->ReceivingDateTime }}</td>
                                    <td>{{ $inbox->SenderNumber }}</td>
                                    <td>{{ $inbox->TextDecoded }}</td>
                                    <td>
                                        <a data-id="{{ $inbox->ID }}" data-nope="{{ $inbox->SenderNumber }}" data-toggle="tooltip" data-title="Hapus" class="btn-hapus"><i class="fa fa-trash"></i> </a>
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
    <div class="modal fade " id="confirm-delete" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash"></i> Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan menghapus pesan ke <span class="nope"></span> ? </p>
                    <span class="hidden id"></span>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
                        <button type="button" class="btn btn-primary delete-inbox" data-dismiss="modal"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
<script>
    $(document).ready(function () {
        $('#saran-tb').DataTable({
            'order' : [[0, 'desc']]
        });
        $('.btn-hapus').click(function () {
            $('.nope').text($(this).data('nope'));
            $('.id').text($(this).data('id'));
            $('#confirm-delete').modal('show');
        });
        $('.delete-inbox').click(function () {
            $.ajax({
                type: 'post',
                url: '{{ route('dropsaran') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': $('.id').text(),
                    'nope': $('.nope').text(),
                },
                success: function (data) {
                    $.alert({
                        title: 'Sukses',
                        icon: 'fa fa-handshake',
                        type: 'purple',
                        content: 'Pesan dari ' + data.nope + ' berhasil dihapus.',
                        buttons: {
                            ok: {
                                btnClass: 'btn-info',
                                action: function () {
                                    location.reload(true);
                                }
                            }
                        }
                    });
                },
                error: function (e) {
                    console.log(e.responseText);
                }
            });
        });
    });
</script>
@endpush