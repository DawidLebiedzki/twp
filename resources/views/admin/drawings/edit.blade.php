
<div class="modal inmodal fade" id="drawing-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Zeichnung bearbeiten</h4>

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
                                <div class="col-md-8 col-sm-10">
                                    <select class="custom-select custom-select-article-id"
                                        id="article_id" name="article_id">
                                        @foreach($articles as $article)
                                            <option value="{{ $article->id }}" {{ $drawing->article_id == $article->id ? 'selected' : '' }}>{{ $article->article_number_intern }}
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
                                        id="drawing_number" name="drawing_number" ></div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label">
                                    <h3>Index </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"><input type="text" class="custom-input form-control" id="index"
                                        name="index" ></div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label">
                                    <h3>AG </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <select class="custom-select" name="stage" id="stage">AG Auswählen...
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label">
                                    <h3>AG Bezeichnung </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <select class="custom-select" name="operation" id="operation">AG Auswählen...
                                    <option value="Profilieren">Profilieren</option>
                                    <option value="Stanzen">Stanzen</option>
                                    <option value="Biegen">Biegen</option>
                                    <option value="Lochen">Lochen</option>
                                    <option value="Beschneiden">Beschneiden</option>
                                </select>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label">
                                    <h3>Datei hochladen </h3>
                                </label>
                                <div class="col-md-8 col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " id="drawing" name="drawing">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Abbrechen</button>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



