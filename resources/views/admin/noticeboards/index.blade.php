@extends('layouts.app')
@section('content-path')
    <div class="col-lg-10">
        <h2>Schwarzes Brett</h2>
    </div>
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col">
                                <h4><i class="fa fa-info-circle"></i> Aushänge</h4>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal5"><i
                                        class="fa fa-upload"></i>
                                    Hochladen</button>
                            </div>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>



                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <input type="text" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Suchen...">

                        <table class="footable table table-stripped" data-page-size="15" data-filter=#filter>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Benennung</th>
                                    <th>Erstellt von:</th>
                                    <th>Erstellt am:</th>
                                    <th data-hide="phone,tablet">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $notice)
                                    <tr>
                                        <td>{{ $notice->id }}</td>
                                        <td>{{ $notice->name }}</td>
                                        <td>{{ $notice->user->fname }} {{ $notice->user->lname }}</td>
                                        <td>{{ $notice->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-lg btn-white btn-bitbucket m-r-sm"><i
                                                        class="fa fa-file-pdf-o"></i></a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal5" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center">
                        <h3>
                            Laden Sie einen Aushang hoch</h3>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <h4><label class="col-form-label">Bennenung des Aushangs: </label></h4>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group mt-3">
                                <div class="custom-file ">
                                    <input id="inputGroupFile01" type="file" class="custom-file-input">
                                    <label class="custom-file-label" for="inputGroupFile01">Wähle eine Datei</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Abbrechen</button>
                    <button type="button" class="btn btn-primary">Speichern</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();
            bsCustomFileInput.init();
        });
    </script>
@endsection
