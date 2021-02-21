@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col">
                            <h3>Neuen Benutzer hinzufügen</h2>
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
                    <form id="user-create-form" method="PUT" action="{{ route('admin.users.update', $user->id) }}">
                      @csrf
                       <div class="row">
                            <div class="col-md-8" >
                            <div class="form-group row ">
                                <label class="col-md-3 col-form-label">
                                    <h3>Benutzername </h3>
                                </label>

                                <div class="col-md-8 col-sm-8"><input type="text" class="form-control" id="username"
                                        name="username" value="{{ $user->username }}"></div>
                            </div>
                            
                            <div class="form-group row ">

                                <label class=col-md-3 col-form-label>
                                    <h3>Vorname </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <input type="text" class="form-control " id="name" name="fname" value="{{ $user->fname }}">
                                </div>

                            </div>
                            <div class="form-group row ">

                                <label class="col-md-3 col-form-label">
                                    <h3>Nachname </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <input type="text" class="form-control " id="lname" name="lname" value="{{ $user->lname }}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-11 mb-3">
                                    <span>
                                        <h3>Berechtigung </h3>
                                    </span>

                                    <hr>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-md-3 col-form-label">
                                    <h3>Benutzerrolle </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"><select class="select2_demo_1 form-control" id="role"
                                        name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->displayed_name }}</option>
                                        @endforeach
                                        
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-11 mt-3 text-right">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div></div>
                        </div>
                        <div class="col-md-4 text-center">

                            <div style="margin-top: 120px">
                                <i class="fa fa-user" style="font-size: 180px;color: #e5e5e5 "></i>
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
            placeholder: "Wähle die Rolle...",
            allowClear: true
        });

    });

</script>
@endsection
