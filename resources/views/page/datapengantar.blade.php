@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Surat</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Data Permohonan Surat Pengantar</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="">
                        <table class="table table-striped" id="pengantars-tb" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nomor Surat</th>
                                <th>Waktu Pembuatan</th>
                                <th>Nik</th>
                                <th>Nama Pemohon</th>
                                <th>Alamat Pemohon</th>
                                <th>Petugas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{ $d->nomorSurat }}</td>
                                    <td>{{ $d->created_at }}</td>
                                    <td>{{ $d->nik }}</td>
                                    <td>{{ ucfirst($d->nama) }}</td>
                                    <td>{{ ucfirst($d->alamat).', Rt/Rw. 0'.$d->rt.'/0'.$d->rw }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>
                                        <a data-toggle="tooltip" title="Print ulang" data-id="{{ $d->nik }}" data-nomor="{{ $d->nomorSurat }}" class="reprint"><i class="fa fa-print"></i> </a>
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
    <div class="modal fade" id="modal-reprint" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Preview Surat</h4>
                </div>
                <div class="modal-body">
                    <div class="surat"></div>
                    <span class="hidden id"></span>
                    <span class="hidden nomor"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
    <script>
        $(document).ready(function () {
            $('#pengantars-tb').DataTable({
                order  : [[1, 'desc']]
            });
            $('.reprint').click(function () {
                $('.id').text($(this).data('id'));
                $('.nomor').text($(this).data('nomor'));
//                $.alert($('.nomor').text(), 'tes');
                $.ajax({
                    type    : 'post',
                    url     : '{{ route('setreprint') }}',
                    data    : {
                        '_token'        : '{{ csrf_token() }}',
                        'nik'           : $('.id').text(),
                        'nomorSurat'    : $('.nomor').text(),
                    },
                    success: function (data) {
                        $('#modal-reprint').modal('show');
                        $('.surat').html('<iframe src="{{ route('reprint') }}" width="100%" height="470px"></iframe>');
                    },
                    error : function (e) {
                        console.log(e.responseText);
                    }
                });
            });
        });
    </script>
@endpush