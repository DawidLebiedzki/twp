@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Benutzer</h5>
                            <a href="#">Test</a>
                                <div class="ibox-tools">
                                    <a href="" class="btn btn-primary btn-xs">Schicht hinzufügen</a>
                                </div>
                            
                        </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Roles</th>
                                        <th class="text-right" data-sort-ignore="true">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
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
    <script>
        $(document).ready(function() {

            $('.footable').footable();

        });

    </script>
@endsection