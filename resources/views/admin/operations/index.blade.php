@extends('layouts.app')



@section('content-path')
    <div class="col-lg-10">
        <h2>Adminitration</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Administration</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="#">Zeichnungen</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ url()->current() }}"><strong>Verwalten</strong></a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col p-l-xs p-r-xs">
                                <h4 class=""><i class="fa fa-gear-o"></i> Arbeitsgang</h4>
                            </div>
                            <div class="col text-right"><a class="btn btn-outline btn-success btn-lg" data-toggle="modal"
                                    data-target="#operation-modal"><i class="fa fa-plus"></i> Hinzufügen</a>
                            </div>
                            <div class="ibox-tools">

                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-4"><input type="text" class="form-control form-control-sm m-b-xs" id="filter"
                                    placeholder="Suchen..."></div>

                        </div>
                        <table class="footable table footable-stripped default footable-loadded" data-page-size="20"
                            data-filter=#filter>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Bezeichnung</th>
                                    <th>Angelegt von:</th>
                                    <th>Angelegt am:</th>
                                    <th class="text-right">Aktionen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($operations as $index => $operation)
                                    <tr>
                                        <td>{{ $index + 1}}</td>
                                        <td>{{ $operation->name }}</td>
                                        <td>{{ $operation->user->fname }} {{ $operation->user->lname }}</td>
                                        <td>{{ date_format($operation->updated_at, 'd.m.Y') }}</td>


                                        <td class="text-right">
                                            <div class="btn-group tooltip-demo">
                                                <a href="#" type="button" class="btn-white btn p-sm" data-toggle="modal"
                                                    data-target="#operation-edit-modal"><i class="fa fa-edit"
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Bearbeiten"></i></a>
                                                <form method="POST" action="#">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-white btn p-sm"><i
                                                            class="fa fa-trash" data-toggle="tooltip" data-placement="right"
                                                            title="Löschen"></i></button>
                                                </form>
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

@endsection

@section('script')
    <!-- Page-Level Scripts -->
    <!-- Page-Level Scripts -->
    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}" defer></script>

    <script>
        $(document).ready(function() {

            $(".select2_demo_1").select2({
                theme: 'bootstrap4',
                placeholder: "Wähle einen Artikel...",
                allowClear: true
            });

            $('.footable').footable();

            $('#operation-create-form').validate({
                rules: {
                    article_id: {
                        required: true,

                    },
                    operation_number: {
                        required: true,

                    },

                    index: {
                        required: true,

                    },
                    stage: {
                        required: true,

                    },
                    operation: {
                        required: true,
                    },
                    operation: {
                        required: true,
                    }
                },
                messages: {
                    article_id: {
                        required: "Dieses Feld ist erforderlich",

                    },
                    operation_number: {
                        required: "Dieses Feld ist erforderlich",

                    },

                    index: {
                        required: "Dieses Feld ist erforderlich",

                    },
                    stage: {
                        required: "Dieses Feld ist erforderlich",

                    },
                    operation: "Dieses Feld ist erforderlich",
                    operation: "Dieses Feld ist erforderlich"
                }
            });

            $('.custom-file-input').change(function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            $('.custom-select-article-id').change(function() {

                var articleId = this.value;
                var url = "articles/";

                $.ajax({
                    url: url + articleId,
                    type: "GET",
                    dataType: 'json',
                    success: function(result) {
                        $('#operation_number').val(result.operation_number);
                        $('#index').val(result.operation_index);
                    }
                });
            });
            //  

        });
    </script>
@endsection
