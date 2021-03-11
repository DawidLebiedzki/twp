@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
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
                    <form id="user-create-form" method="POST" action="{{ route('admin.users.store') }}">
                      @csrf
                       <div class="row">
                            <div class="col-md-8" >
                            <div class="form-group row ">
                                <label class="col-md-3 col-form-label">
                                    <h3>Benutzername </h3>
                                </label>

                                <div class="col-md-8 col-sm-8"><input type="text" class="form-control" id="username"
                                        name="username"></div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-3 col-form-label">
                                    <h3>Passwort </h3>
                                </label>

                                <div class="col-md-8 col-sm-10"><input type="password" class="form-control"
                                        id="password" name="password"></div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-3 col-form-label">
                                    <h3>Passwort bestätigen </h3>
                                </label>

                                <div class="col-md-8 col-sm-10"><input type="password" class="form-control"
                                        id="password_confirm" name="password_confirm"></div>
                            </div>
                            <div class="form-group row ">

                                <label class=col-md-3 col-form-label">
                                    <h3>Vorname </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <input type="text" class="form-control " id="fname" name="fname">
                                </div>

                            </div>
                            <div class="form-group row ">

                                <label class="col-md-3 col-form-label">
                                    <h3>Nachname </h3>
                                </label>
                                <div class="col-md-8 col-sm-10"> <input type="text" class="form-control " id="lname" name="lname">
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
                                <button type="submit" class="btn btn-success">Neuen Benutzer hinzufügen</button>
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

        $('#user-create-form').validate({
        rules: {
            username: {
                required: true,
                number:true
            },
            password: {
                required: true,
                minlength: 4
            },
            password_confirm: {
                required: true,
                equalTo: "#password"
            },
            fname:  {
                required: true,
                minlength: 2
            },
            lname:  {
                required: true,
                minlength: 2
            },
            role: "required"  
        },
        messages:{
            username: {
                required:"Dieses Feld ist erforderlich",
                number:"Dieses Feld muss eine Zahl sein"
            },
            password: "Dieses Feld ist erforderlich",
            password_confirm: {
                required: "Dieses Feld ist erforderlich",
                equalTo: "Passwort muss gleich sein"
            },
            fname: {
                required: "Dieses Feld ist erforderlich",
                minlength: "Mindestens 2 Zeichen"
            },
            lname:{
                required: "Dieses Feld ist erforderlich",
                minlength: "Mindestens 2 Zeichen"
            },
            role: "Dieses Feld ist erforderlich"
        }
    });

    });
    
</script>
@endsection
