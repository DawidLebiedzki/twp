@extends('layouts.app')

@section('content')
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col"><h4><i class="fa fa-users"></i> Kunden</h4></div>
                        <div class="col text-right"><a href="" class="btn btn-white btn-lg"><i class="fa fa-plus"></i> Hinzufügen</a></div>
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
                            <table class="footable table table-stripped" data-page-size="15" data-filter=#filter>
                                <thead>
                                <tr>
                                    
                                    <th>Kunde</th>
                                    <th>Kunden Bezeichn.</th>
                                    <th data-hide="phone,tablet">Stadt</th>
                                    <th data-hide="phone,tablet">PLZ</th>
                                    <th data-hide="phone,tablet">Land</th>
                                    <th data-hide="phone,tablet">Kontakt</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach ($customers as $customers)
                                        <tr>
                                                <td>{{ $customers->company_name }}</td>
                                                <td>{{ $customers->company_code }}</td>
                                                <td>{{ $customers->city }}</td>
                                                <td>{{ $customers->postcode }}</td>
                                                <td>{{ $customers->country }}</td>
                                                <td>{{ $customers->contact_person }}</td>
                                                <td >
                                                    <div class="btn-group tooltip-demo">
                                                        <button type="button" class="btn-white btn btn-xs"><i class="fa fa-eye" data-toggle="tooltip" data-placement="left" title="Vorschau"></i></button>
                                                        <button type="button" class="btn-white btn btn-xs"><i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Bearbeiten"></i></button> 
                                                        <button type="button" class="btn-white btn btn-xs"><i class="fa fa-trash" data-toggle="tooltip" data-placement="right" title="Löschen"></i></button>
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
<script>
    $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

</script>
@endsection