@extends('master')
@section('content')
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="min-height:450px;">
                    <div class="x_title">
                        <h2>Data Pengguna</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="">
                        <table class="table table-striped" id="usertb" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width: 10%">ID Pengguna</th>
                                <th style="width: 30%">Nama Pengguna</th>
                                <th style="width: 25%">Email Pengguna</th>
                                <th style="width: 10%">Level</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->level }}</td>
                                    <td>{{ $d->status }}</td>
                                    <td>
                                        <a class="btn-edit" data-toggle="tooltip" data-title="Edit data" data-id="{{ $d->id }}"
                                        data-name="{{ $d->name }}" data-email="{{ $d->email }}" data-level="{{ $d->level }}" data-status="{{ $d->status }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
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
    <div class="modal fade " id="user-edit" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-check-square-o"></i> Edit Data Pengguna</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-4">ID Pengguna : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id-pengguna" id="id-pengguna" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Nama Pengguna : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama-pengguna" id="nama-pengguna">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Email Pengguna : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email-pengguna" id="email-pengguna">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Level : </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="level-pengguna" style="width: 50%">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Status : </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="status-pengguna" style="width: 50%">
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
                        <button type="button" class="btn btn-primary btn-update" data-dismiss="modal"><i class="fa fa-trash"></i> Simpan perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
    <script>
        $(document).ready(function () {
            $('#usertb').DataTable();
            $('.btn-edit').click(function () {
                $('#id-pengguna').val($(this).data('id'));
                $('#nama-pengguna').val($(this).data('name'));
                $('#email-pengguna').val($(this).data('email'));
                $('#level-pengguna').val($(this).data('level'));
                $('#status-pengguna').val($(this).data('status'));

                $('#user-edit').modal('show');
            });
            $('.btn-update').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type    : 'post',
                    url     : '{{ route('edituser') }}',
                    data    : {
                        '_token'    : '{{ csrf_token() }}',
                        'id'        : $('#id-pengguna').val(),
                        'name'      : $('#nama-pengguna').val(),
                        'email'     : $('#email-pengguna').val(),
                        'level'     : $('#level-pengguna').val(),
                        'status'    : $('#status-pengguna').val(),
                    },
                    success : function (data) {
                        $.alert({
                            type    : 'blue',
                            title   : 'Sukses',
                            icon    : 'fa fa-handshake-o',
                            content : 'Data pengguna berhasil di update',
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
                        console.log(e.responseText);
                    }
                });
            });
            $('.btn-confirm-hapus').click(function () {
                $('.username').text($(this).data('name'));
                $('.id').text($(this).data('id'));
                $('#confirm-delete').modal('show');
            });
            {{--$('.btn-delete').click(function () {--}}
                {{--$.ajax({--}}
                    {{--type    : 'post',--}}
                    {{--url     : '{{ route('deleteuser') }}',--}}
                    {{--data    : {--}}
                        {{--'_token'    : '{{ csrf_token() }}',--}}
                        {{--'id'        : $('.id').text(),--}}
                    {{--},--}}
                    {{--success : function (data) {--}}
                        {{--$.alert({--}}
                            {{--type    : 'blue',--}}
                            {{--title   : 'Sukses',--}}
                            {{--icon    : 'fa fa fa-handshake-o',--}}
                            {{--content : 'Data pengguna berhasil di hapus.',--}}
                            {{--buttons : {--}}
                                {{--ok  : {--}}
                                    {{--btnClass    : 'btn-primary',--}}
                                    {{--action      : function () {--}}
                                        {{--location.reload(true);--}}
                                    {{--}--}}
                                {{--}--}}
                            {{--}--}}
                        {{--});--}}
                    {{--},--}}
                    {{--error   : function (e) {--}}
                        {{--console.log(e.responseText);--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        });
    </script>
@endpush