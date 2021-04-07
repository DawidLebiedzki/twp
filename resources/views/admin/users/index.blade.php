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
                            <a href="#">Benutzer</a>
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
                        <div class="col">
                            <h4><i class="fa fa-user"></i> Benutzer</h4>
                        </div>
                        <div class="col text-right"><a href="{{ route('admin.users.create') }}"
                                class="btn btn-outline btn-success btn-lg"><i class="fa fa-plus"></i> Hinzufügen</a></div>
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
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Personalnummer</th>
                                <th>Vorname</th>
                                <th>Nachname</th>
                                <th data-hide="phone,tablet">Berechtigungen</th>
                                <th data-hide="phone,tablet">Erstellt am:</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Personalnummer</th>
                                <th>Vorname</th>
                                <th>Nachname</th>
                                <th data-hide="phone,tablet">Berechtigungen</th>
                                <th data-hide="phone,tablet">Erstellt am:</th>
                                <th class="text-right">Action</th>
                               
                            </tr>
                        </tfoot>
                    </table>
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

        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            
            processing: true,
            language: {
                    "lengthMenu": "Zeige _MENU_ Rekorde per Seite",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Seite anzeigen _PAGE_ von _PAGES_",
                    "infoEmpty": "Keine Rekorde vorhanden",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search":         "Suchen:",
                    "paginate": {
                                    "first":      "Erste",
                                    "last":       "Letzte",
                                    "next":       "Nächste",
                                    "previous":   "Vorherige"
                    },
            },
            dom: '<"html5buttons"B>lTfgitp',
            ajax: "{{ route('admin.users.index') }}",
            columns: [
                {data: 'username', name: 'username'},
                {data: 'fname', name: 'fname'},
                {data: 'lname', name: 'lname'},
                {data: 'role', name: 'role', searchable: false},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [
                            { 
                                width: "5%",
                                targets: [0] 
                            },
                            { 
                                width: "10%",
                                targets: -1 
                            },
                            {
                                targets: -1,
                                className: 'text-center'
                            }
                        ],
            buttons: [
                    
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
                    

                ]
            
            });


    });

</script>
@endsection
