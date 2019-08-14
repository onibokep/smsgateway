@extends('master')

@section('content')
<div class="">

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height:450px;">
                <div class="x_title">
                    <h2>Form Tambah Pengguna</h2>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <div class="">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3><i class="fa fa-user-plus"></i></h3> </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('storeuser') }}" id="form-user">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Nama</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">Alamat E-Mail</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                                <label for="level" class="col-md-4 control-label">Level</label>

                                                <div class="col-md-6">
                                                    <select id="level" class="form-control" name="level">
                                                        <option value="">--Pilih--</option>
                                                        <option value="user">User</option>
                                                        <option value="admin">Admin</option>
                                                    </select>

                                                    @if ($errors->has('level'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('level') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary reg-user" id="submit-user">
                                                        <i class="fa fa-save"></i>
                                                        Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            function  validateEmail($email){
                var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return regex.test($email);
            };

            $('#submit-user').click(function(event) {
                /* Act on the event */
                event.preventDefault();
                if ($('#name').val() == "") {
                    // statement
                    $.alert({
                        type    : 'orange',
                        title   : 'Peringatan',
                        icon    : 'fa fa-warning',
                        theme   : 'material',
                        content : 'Nama belum diisi !',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-warning',
                                action      : function () {
                                    //
                                }
                            }
                        }
                    });
                } else if ($('#email').val() == ""){
                    // statement
                    $.alert({
                        type    : 'orange',
                        title   : 'Peringatan',
                        icon    : 'fa fa-warning',
                        theme   : 'material',
                        content : 'Email belum diisi !',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-warning',
                                action      : function () {
                                    //
                                }
                            }
                        }
                    });
                }else if (!validateEmail($('#email').val())) {
                    // statement
                    $.alert({
                        type    : 'orange',
                        title   : 'Peringatan',
                        icon    : 'fa fa-warning',
                        theme   : 'material',
                        content : 'Format email salah !',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-warning',
                                action      : function () {
                                    //
                                }
                            }
                        }
                    });
                } else if ($('#password').val() == ""){
                    $.alert({
                        type    : 'orange',
                        title   : 'Peringatan',
                        icon    : 'fa fa-warning',
                        theme   : 'material',
                        content : 'Password belum diisi !',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-warning',
                                action      : function () {
                                    //
                                }
                            }
                        }
                    });
                } else if ($('#level').val() == ""){
                    $.alert({
                        type    : 'orange',
                        title   : 'Peringatan',
                        icon    : 'fa fa-warning',
                        theme   : 'material',
                        content : 'Level belum dipilih !',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-warning',
                                action      : function () {
                                    //
                                }
                            }
                        }
                    });
                } else if ($('#password').val() == $('#password-confirm').val()) {
                    // statement
                    $.ajax({
                        type    : 'post',
                        url     : '{{ route('storeuser') }}',
                        data    : {
                            '_token'    : '{{ csrf_token() }}',
                            'name'      : $('#name').val(),
                            'email'     : $('#email').val(),
                            'level'     : $('#level').val(),
                            'password'  : $('#password').val(),
                        },
                        success : function (data) {
                            $.alert({
                                type    : 'blue',
                                title   : 'Sukses',
                                icon    : 'fa fa-handshake-o',
                                theme   : 'modern',
                                content : 'Data pengguna berhasil di ditambahkan',
                                buttons : {
                                    ok  : {
                                        btnClass    : 'btn-primary',
                                        action      : function () {
                                            $('#form-user').trigger('reset');
//                                        location.reload(true);
                                        }
                                    }
                                }
                            });
                        },
                        error   : function (e) {
                            // console.log(e.responseText);
                            $.alert({
                            type    : 'red',
                            title   : 'Error',
                            content : e.responseText,
                            closeIcon   : true,
                            boxWidth    : '80%',
                            useBootstrap    : false,
                        });
                        }
                    });
                } else {
                    $.alert({
                        type    : 'orange',
                        title   : 'Peringatan',
                        icon    : 'fa fa-warning',
                        theme   : 'material',
                        content : 'Konfirmasi password tidak sama !',
                        buttons : {
                            ok  : {
                                btnClass    : 'btn-warning',
                                action      : function () {
                                    //
                                }
                            }
                        }
                    });
                }
            });

//             $('.reg-user1').click(function (e) {
//                 e.preventDefault();
//                 if ($('#password').val() == $('#password-confirm').val()){
//                     $.ajax({
//                         type    : 'post',
//                         url     : '{{ route('storeuser') }}',
//                         data    : {
//                             '_token'    : '{{ csrf_token() }}',
//                             'name'      : $('#nama-pengguna').val(),
//                             'email'     : $('#email-pengguna').val(),
//                             'level'     : $('#level-pengguna').val(),
//                             'password'  : $('#password').val(),
//                         },
//                         success : function (data) {
//                             $.alert({
//                                 type    : 'blue',
//                                 title   : 'Sukses',
//                                 icon    : 'fa fa-handshake-o',
//                                 content : 'Data pengguna berhasil di ditambahkan',
//                                 buttons : {
//                                     ok  : {
//                                         btnClass    : 'btn-primary',
//                                         action      : function () {
// //                                        location.reload(true);
//                                         }
//                                     }
//                                 }
//                             });
//                         },
//                         error   : function (e) {
//                             console.log(e.responseText);
//                         }
//                     });
//                 }else{
//                     $.alert({
//                         type    : 'orange',
//                         title   : 'Peringatan',
//                         icon    : 'fa fa-warning',
//                         content : 'Konfirmasi password tidak sama !',
//                         buttons : {
//                             ok  : {
//                                 btnClass    : 'btn-primary',
//                                 action      : function () {
// //                                        location.reload(true);
//                                 }
//                             }
//                         }
//                     });
//                 }

//             });
        });
    </script>
@endpush
