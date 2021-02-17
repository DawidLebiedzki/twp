@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col">
                            <h2>Benutzer erstellen</h2>
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
                    <form id="form" action="#" class="wizard-big">
                        <h1>Konto</h1>
                        <fieldset>
                            <h2>Kontoinformationen</h2>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Personalnummer *</label>
                                        <input id="userName" name="userName" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Passwort *</label>
                                        <input id="password" name="password" type="password" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Passwort bestätigen *</label>
                                        <input id="confirm_password" name="confirm_password" type="password" class="form-control required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div style="margin-top: 20px">
                                            <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <h1>Personaldaten</h1>
                        <fieldset>
                            <h2>Berechtigung</h2>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Vorname *</label>
                                        <input id="fname" name="fname" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Nachname *</label>
                                        <input id="lname" name="lname" type="text" class="form-control required ">
                                    </div>


                                    <div class="form-group">

                                        <label>Abteilung *</label>
                                        <select id="department" class="form-control m-b" name="account">
                                            <option value="">Profilieren</option>
                                            <option value="">Stanzerei</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Profilbild </label>
                                    <div class="custom-file">
                                        <input id="logo" type="file" class="custom-file-input">
                                        <label for="logo" class="custom-file-label">Wähle Datei...</label>
                                    </div> </div>
                                </div>
                            </div>
                        </fieldset>

                        <h1>Berechtigung</h1>
                        <fieldset>
                            <div class="text-center" style="margin-top: 120px">
                                <h2>You did it Man :-)</h2>
                            </div>
                        </fieldset>

                        <h1>Übersicht</h1>
                        <fieldset>
                            <h2>Terms and Conditions</h2>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label
                                for="acceptTerms">I agree with the Terms and Conditions.</label>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@section('script')
<!-- Page-Level Scripts -->

<script>
    $(document).ready(function () {
        
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex) {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18) {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex) {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex) {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                var form = $(this);

                // Submit form input
                form.submit();
            },
            labels: {
                cancel: 'Abbrechen',
                finish: 'Speichern',
                next: 'Weiter',
                previous: 'Zurück'
            }
        }).validate({
            errorPlacement: function (error, element) {
                element.before(error);
            },
            rules: {
                userName: {
                    required: true,
                    number: true,
                    maxlength:3
                },
                password:{
                    minlength: 3,
                    maxlength: 10
                },
                confirm_password: {
                    equalTo: "#password"
                },

            },
            messages:{
                userName:{
                    required:"Dieses Feld muss ausgefüllt werden",
                    number: "Geben Sie eine gültige Nummer ein"
                }
            }
        });
    });

</script>
@endsection
