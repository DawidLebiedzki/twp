@extends('layouts.app')


@section('content')



  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col">
                            <h4><i class="fa fa-picture-o"></i> Zeichnungen</h4>
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
                    <div class="row">
                        <div class="col-4"><input type="text" class="form-control form-control-sm m-b-xs" id="filter"
                                placeholder="Suchen..."></div>

                    </div>
                    <table class="footable table footable-stripped default footable-loadded" data-page-size="20" data-filter=#filter>
                        <thead>
                            <tr>
                               
                                <th >F-Nummer</th>
                                <th>AG</th>
                                <th>AG Bezeichnung</th>
                                <th data-hide="phone,tablet">Kd.-Zeich. Nr.</th>
                                <th data-hide="phone,tablet">Index</th>
                                <th>Geändert am:</th>
                                <th>Geändert von:</th> 
                                <th>Vorschau</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drawings as $drawing)
                                <tr>
                                    
                                    <td><strong>{{ $drawing->article->article_number_intern}}</strong></td>
                                    <td>{{ $drawing->stage }}</td>
                                    <td>{{ $drawing->operation }}</td>
                                    <td>{{ $drawing->drawing_number }} </td>
                                    <td>{{ $drawing->index }}</td>
                                    <td>{{ date_format($drawing->updated_at, 'd.m.Y') }}</td>
                                    <td>{{ $drawing->user->fname}} {{ $drawing->user->lname}}</td>
                                    <td class="text-center" ><a href="{{ $drawing->getFirstMediaUrl() }}" target="_blank" class="btn btn-default btn-outline  "><i class="fa fa-file-pdf-o"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Vorschau"></a></td>
                                    
                                    
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
