
$('#simpanUser').click(function(e){
    e.preventDefault();
    var action = $('#formUser').attr('action');
    var dataString = {
        username: $('#username').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        level: $('#level').val(),
        is_ajax: 1};

    $.ajax({
        type: 'POST',
        url: action,
        data: dataString,
        success: function(response){
            if (response == 'success') {
                $.alert('Simpan data user berhasil','Sukses');
                $('#username').val(''),$('#email').val(''),$('#password').val('');
            }
            else {
                $.alert('gagal');
            }
        }
    });
});
$(document).ready(function(){
    $('#pendudukDetail').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');

        $.ajax({
            type : 'post',
            url : 'page/detailPenduduk.php',
            data :  'nik='+ rowid,
            success : function(data){
                $('.penduduk').html(data);
            }
        });
    });
});
$('#pendudukSv').click(function(e){
    e.preventDefault();
    var target = $('#form-penduduk').attr('action');
    var nik,nama,tmlahir,tglahir,kelamin,status,telp,alamat,rt,rw,kelurahan,kecamatan,kabupaten,provinsi,kodepos;
    nik = $('#nik').val();nama = $('#nama').val();tmlahir = $('#tmlahir').val();tglahir = $('#tglahir').val();kelamin = $('#kelamin').val();
    status = $('#status').val();telp = $('#telp').val();alamat = $('#alamat').val();rt = $('#rt').val();rw = $('#rw').val();
    kelurahan = $('#kelurahan').val();kecamatan = $('#kecamatan').val();kabupaten = $('#kabupaten').val();
    provinsi = $('#provinsi').val();kodepos = $('#kodepos').val();
    dataString = 'nik='+nik+'&nama='+nama+'&tmlahir='+tmlahir+'&tglahir='+tglahir+'&kelamin='+kelamin+'&status='+status+
        '&telp='+telp+'&alamat='+alamat+'&rt='+rt+'&rw='+rw+'&kelurahan='+kelurahan+'&kecamatan='+kecamatan+'&kabupaten='+kabupaten+
        '&provinsi='+provinsi+'&kodepos='+kodepos;
    $.ajax({
        type: 'POST',
        url: target,
        data: dataString,
        success: function(data){
            $.alert('Simpan data sukses','Info');
            $('#nik').val(''),$('#nama').val(''),$('#tmlahir').val(''),$('#tglahir').val('')
                ,$('#telp').val(''),$('#alamat').val(''),$('#rt').val(''),$('#rw').val('');
        }
    });
});
$('#pesan-personal').click(function(){
    if ($('#tujuan').val() != '') {
        var tujuan = $('#tujuan').val();
        var teks = $('#teks').val();
        var dataString = 'tujuan='+ tujuan +'&teks='+ teks;
        $.ajax({
            type: 'POST',
            data: dataString,
            url: 'modul/kirimsms.php',
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
        $.alert('Nomor tujuan kosong !','Warning');
    }
});
$('#pesan-broadcast').click(function(){
    if ($('#grup-tujuan').val() != '') {
        var tujuan = $('#tujuan').val();
        var teks = $('#teks').val();
        var dataString = 'tujuan='+ tujuan +'&teks='+ teks;
        $.ajax({
            type: 'POST',
            data: dataString,
            url: 'modul/kirimsmsgrup.php',
            success: function(data){
                $.alert({
                    icon: 'fa fa-spinner fa-spin',
                    title: 'Mengirim',
                    content: 'Sedang mengirim pesan .....',
                    type: 'blue',
                    typeAnimated: true,
                    autoClose: 'ok|3000',
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
        $.alert('Grup tujuan kosong !','Warning');
    }
});
$('#noTelp').click(function (e) {
    $('#tujuan').val('');
    var telp = $('#noTelp').val();
    $('#tujuan').val(telp);
    // document.getElementById('tujuan').setAttribute('value', telp);
});

//        $(window).on('unload', function () {
//            $.ajax({
//                type : 'POST',
//                url : 'access/logout.php'
//            });
//        });

