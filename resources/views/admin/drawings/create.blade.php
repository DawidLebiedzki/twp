{{-- @extends('layouts.app')

@section('content')
@if($errors->any())
    <div>
@foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dissmisable">{{ $error }}</div>
@endforeach
</div>
@endif
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col">
                            <h3>Neue Zeichnung hinzufügen</h2>
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
                    <form id="drawing-create-form" method="POST"
                        action="{{ route('admin.drawings.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row ">
                                    <label class="col-md-3 col-form-label">
                                        <h3>F-Nummer </h3>
                                    </label>

                                    <div class="col-md-8 col-sm-10"><select class="select2_demo_1 form-control"
                                            id="article_id" name="article_id">
                                            @foreach($articles as $article)
                                                <option value="{{ $article->id }}">
                                                    {{ $article->article_number_intern }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-md-3 col-form-label">
                                        <h3>Kd.-Art. Nummer </h3>
                                    </label>

                                    <div class="col-md-8 col-sm-10"><input type="text" class="form-control"
                                            id="drawing_number" name="drawing_number"></div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-md-3 col-form-label">
                                        <h3>Index </h3>
                                    </label>

                                    <div class="col-md-8 col-sm-10"><input type="text" class="form-control" id="index"
                                            name="index"></div>
                                </div>
                                <div class="form-group row ">

                                    <label class=col-md-3 col-form-label">
                                        <h3>AG </h3>
                                    </label>
                                    <div class="col-md-8 col-sm-10"> <input type="text" class="form-control " id="stage"
                                            name="stage">
                                    </div>

                                </div>
                                <div class="form-group row ">

                                    <label class=col-md-3 col-form-label">
                                        <h3>AG Bezeichnung </h3>
                                    </label>
                                    <div class="col-md-8 col-sm-10"> <input type="text" class="form-control "
                                            id="operation" name="operation">
                                        <hr>
                                    </div>

                                </div>

                                <div class="form-group row ">

                                    <label class="col-md-3 col-form-label">
                                        <h3>Datei hochladen </h3>
                                    </label>
                                    <div class="col-md-8 col-sm-10">

                                        <input type="file" class="form-control" id="drawing" name="drawing">


                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col-md-11 mt-3 text-right">
                                <button type="submit" class="btn btn-success">Neue Zeichnung hinzufügen</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 text-center">

                    <div style="margin-top: 120px">
                        <i class="fa fa-picture-o" style="font-size: 180px;color: #e5e5e5 "></i>
                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>

@endsection

@section('script')
<!-- Page-Level Scripts -->
<script src="{{ asset('js/plugins/select2/select2.full.min.js') }}" defer></script>

<script>
    $(document).ready(function () {

        $(".select2_demo_1").select2({
            theme: 'bootstrap4',
            placeholder: "Wähle einen Artikel...",
            allowClear: true
        });

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
        $('.custom-file-input').on('change', function () {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

    });

</script>
@endsection--}}
<div class="modal inmodal fade" id="drawing-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Neue Zeichnung hinzufügen</h4>
@if($errors->any())
    <div>
@foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dissmisable">{{ $error }}</div>
@endforeach
</div>
@endif
            </div>
            <div class="modal-body">
                <form id="drawing-create-form" method="POST"
                    action="{{ route('admin.drawings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label">
                                    <h3>F-Nummer </h3>
                                </label>

                                <div class="col-md-8 col-sm-10"><select class="select2_demo_1 form-control"
                                        id="article_id" name="article_id">
                                        @foreach($articles as $article)
                                            <option value="{{ $article->id }}">{{ $article->article_number_intern }}
                                            </option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label">
                                    <h3>Kd.-Art. Nummer </h3>
                                </label>

                                <div class="col-md-8 col-sm-10"><input type="text" class="form-control"
                                        id="drawing_number" name="drawing_number" disabled></div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label">
                                    <h3>Index </h3>
                                </label>

                                <div class="col-md-8 col-sm-10"><input type="text" class="form-control" id="index"
                                        name="index" disabled></div>
                            </div>
                            <div class="form-group row ">

                                <label class=col-md-4 col-form-label">
                                    <h3>AG </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <input type="text" class="form-control " id="stage"
                                        name="stage">
                                </div>

                            </div>
                            <div class="form-group row ">

                                <label class=col-md-4 col-form-label">
                                    <h3>AG Bezeichnung </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <input type="text" class="form-control " id="operation"
                                        name="operation">
                                    <hr>
                                </div>

                            </div>

                            <div class="form-group row ">

                                <label class="col-md-4 col-form-label">
                                    <h3>Datei hochladen </h3>
                                </label>
                                <div class="col-md-8 col-sm-10">

                                    <input type="file" class="form-control" id="drawing" name="drawing">


                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Abbrechen</button>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
            </div>

        </div>
        </form>
    </div>


</div>
</div>
</div>


@section('script')
@parent
<!-- Page-Level Scripts -->
<script src="{{ asset('js/plugins/select2/select2.full.min.js') }}" defer></script>

<script>
    $(document).ready(function () {

        $(".select2_demo_1").select2({
            theme: 'bootstrap4',
            placeholder: "Wähle einen Artikel...",
            allowClear: true
        });

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
        $('.custom-file-input').on('change', function () {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

    });

</script>
@endsection

