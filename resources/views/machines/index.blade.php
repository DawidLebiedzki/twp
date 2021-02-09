@extends('layouts.app')


@section('content')



  <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Maschinen</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-machine">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
              <div class="ibox-content">
                            <input type="text" class="form-control form-control-sm m-b-xs" id="filter"
                                   placeholder="Suchen...">

                            <table class="footable table table-stripped" data-page-size="15" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Benennung</th>
                                    <th>Nummer</th>
                                    <th data-hide="phone,tablet" >Action</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach ($machines as $machine)
                                        <tr>
                                                <td>{{ $machine->id }}</td>
                                                <td>{{ $machine->name }}</td>
                                                <td>{{ $machine->number }}</td>
                                                <td >
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-lg btn-white btn-bitbucket m-r-sm"><i class="fa fa-edit"></i></a> 
                                                        <a href="#"class="btn btn-lg btn-white btn-bitbucket"><i class="fa fa-trash"></i></a></td>
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
