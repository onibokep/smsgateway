@extends('master')
@section('content')
    <div class="">

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Kotak Keluar</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <table class="table table-striped" id="outbox">
                            <thead>
                            <tr>
                                <th style="width: 15%">Waktu</th>
                                <th style="width: 15%">Nomor Tujuan</th>
                                <th style="width: 50%">Pesan</th>
                                <th>Pengirim</th>
                                <th style="width: 5%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($out as $d)
                                <tr class="item{{ $d->ID }}">
                                    <td>{{ $d->SendingDateTime }}</td>
                                    <td>{{ $d->DestinationNumber }}</td>
                                    <td>{{ $d->TextDecoded }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>
                                        <a class="btn-hapus" data-id="{{ $d->ID }}" data-nope="{{ $d->DestinationNumber }}" data-toggle="tooltip" data-title="Hapus"><i class="fa fa-trash"></i> </a>
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
                        <button type="button" class="btn btn-primary btn-delete" data-dismiss="modal"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
    <script>
        $(document).ready(function () {
            $('#outbox').DataTable();
            $('.btn-hapus').click(function () {
                $('.nope').text($(this).data('nope'));
                $('.id').text($(this).data('id'));
                $('#confirm-delete').modal('show');
            });
            $('.btn-delete').click(function () {
                $.ajax({
                    type: 'post',
                    url: '{{ route('dropoutbox') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': $('.id').text(),
                        'nope': $('.nope').text(),
                    },
                    success: function (data) {
                        // $.alert({
                        //     title: 'Sukses',
                        //     icon: 'fa fa-handshake-o',
                        //     type: 'purple',
                        //     content: 'Pesan dari ' + data.nope + ' berhasil dihapus.',
                        //     buttons: {
                        //         ok: {
                        //             action: function () {
                        //                 location.reload(true);
                        //             }
                        //         }
                        //     }
                        // });
                        $('.item' + $('.id').text()).remove();
                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            {{--$('#outbox').DataTable({--}}
            {{--processing  : true,--}}
            {{--serverSide  : true,--}}
            {{--ajax        : '{{ URL::asset('dataoutbox') }}',--}}
            {{--columns     : [--}}
            {{--{ data : 'SendingDateTime', name : 'SendingDateTime' },--}}
            {{--{ data : 'DestinationNumber', name : 'DestinationNumber' },--}}
            {{--{ data : 'TextDecoded', name : 'TextDecoded' },--}}
            {{--]--}}
            {{--});--}}
        });
    </script>
@endpush