@extends('master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Surat Pengantar</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                    <div class="x_title">
                        <h2>Surat Keterangan Domisili</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="ctkDom" role="dialog">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Preview keterangan Domisili</h4>
                        </div>
                        <div class="modal-body">
                            <iframe id="crDom"  width="100%" height="500px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop