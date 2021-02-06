@extends('layouts.app')

@section('content')
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Artikel</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
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
                                    
                                    <th>F-Nummer</th>
                                    <th>Kunde Artikel-Nr.</th>
                                    <th data-hide="phone,tablet">Benennung</th>
                                    <th data-hide="phone,tablet">Zeichnung-Nr.</th>
                                    <th data-hide="phone,tablet">Index</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach ($articles as $article)
                                        <tr>
                                                <td>{{ $article->article_number_intern }}</td>
                                                <td>{{ $article->article_number_customer }}</td>
                                                <td>{{ $article->name }}</td>
                                                <td>{{ $article->profil_number }}</td>
                                                <td>{{ $article->drawing_number }}</td>
                                                <td>{{ $article->drawing_index }}</td>
                                                <td >
                                                    <div class="btn-group">
                                                        <a href="#"><button type="button" class="btn-success btn btn-xs m-r-sm ">Editieren</button></a> 
                                                        <a href="#"><button type="button" class="btn-danger btn btn-xs  ">Löschen</button></a></td>
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