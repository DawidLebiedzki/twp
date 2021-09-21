@extends('layouts.app')



@section('content-path')
    <div class="col-lg-10">
        <h2>Zeichnungen</h2>

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
                                <h4 class=""><i class=" fa fa-picture-o"></i> Zeichnungen</h4>
                            </div>
                            <div class="col text-right"><a class="btn btn-outline btn-success btn-lg" data-toggle="modal"
                                    data-target="#drawing-modal"><i class="fa fa-plus"></i> Hinzufügen</a>
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
                            <div class="col-4"><input type="text" class="form-control form-control-sm m-b-xs"
                                    id="filter" placeholder="Suchen..."></div>

                        </div>
                        <table class="footable table footable-stripped default footable-loadded" data-page-size="20"
                            data-filter=#filter>
                            <thead>
                                <tr>

                                    <th>F-Nummer</th>
                                    <th>AG</th>
                                    <th>AG Bezeichnung</th>
                                    <th data-hide="phone,tablet">Kd.-Zeich. Nr.</th>
                                    <th data-hide="phone,tablet">Index</th>
                                    <th>Geändert am:</th>
                                    <th>Geändert von:</th>
                                    <th>Zeichnung</th>
                                    <th class="text-right">Aktionen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drawings as $drawing)
                                    <tr>

                                        <td>{{ $drawing->article->article_number_intern }}</td>
                                        <td>{{ $drawing->stage }}</td>
                                        <td>{{ $drawing->operation }}</td>
                                        <td>{{ $drawing->drawing_number }} </td>
                                        <td>{{ $drawing->index }}</td>
                                        <td>{{ date_format($drawing->updated_at, 'd.m.Y') }}</td>
                                        <td>{{ $drawing->user->fname }} {{ $drawing->user->lname }}</td>
                                        <td class="text-center"><a href="{{ $drawing->getFirstMediaUrl() }}"
                                                target="_blank" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Vorschau</a>
                                        </td>

                                        <td>
                                            
                                                <a href="{{ url('admin/drawings/' . $drawing->id . '/edit') }}"
                                                    type="button" class="btn btn-white btn-sm" data-toggle="modal"
                                                    data-target="#drawing-edit-modal"><i class="fa fa-edit"></i> Edit</a>
                                                        
                                                <form method="POST" action="{{ url('admin/drawings/' . $drawing->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-white btn-sm">
                                                        <i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            
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

            $('#drawing-create-form').validate({
                rules: {
                    article_id: {
                        required: true,

                    },
                    drawing_number: {
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
                    drawing: {
                        required: true,
                    }
                },
                messages: {
                    article_id: {
                        required: "Dieses Feld ist erforderlich",

                    },
                    drawing_number: {
                        required: "Dieses Feld ist erforderlich",

                    },

                    index: {
                        required: "Dieses Feld ist erforderlich",

                    },
                    stage: {
                        required: "Dieses Feld ist erforderlich",

                    },
                    operation: "Dieses Feld ist erforderlich",
                    drawing: "Dieses Feld ist erforderlich"
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
                        $('#drawing_number').val(result.drawing_number);
                        $('#index').val(result.drawing_index);
                    }
                });
            });
            //  

        });
    </script>
@endsection
@include('admin.drawings.create')
@include('admin.drawings.edit')
