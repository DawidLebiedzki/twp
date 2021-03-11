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
                            <a href="#">Zeichnungen</a>
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
                            <h4><i class="fa fa-picture-o"></i> Zeichnungen</h4>
                        </div>
                        <div class="col text-right"><a 
                                class="btn btn-white btn-lg" data-toggle="modal" data-target="#drawing-modal" ><i class="fa fa-plus"></i> Hinzufügen</a></div>
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
                                <th>Zeichnung</th>
                                <th class="text-right">Aktionen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drawings as $drawing)
                                <tr>
                                    
                                    <td>{{ $drawing->article->article_number_intern}}</td>
                                    <td>{{ $drawing->stage }}</td>
                                    <td>{{ $drawing->operation }}</td>
                                    <td>{{ $drawing->drawing_number }} </td>
                                    <td>{{ $drawing->index }}</td>
                                    <td>{{ date_format($drawing->updated_at, 'd.m.Y') }}</td>
                                    <td>{{ $drawing->user->fname}} {{ $drawing->user->lname}}</td>
                                    <td class="text-center" ><a href="{{ $drawing->getFirstMediaUrl() }}" target="_blank" class="btn btn-white"><i class="fa fa-file-pdf-o"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Vorschau"></a></td>
                                    
                                    <td class="text-right">
                                        <div class="btn-group tooltip-demo">
                                            <button type="button" class="btn-white btn btn"><i class="fa fa-eye"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Vorschau"></i></button>
                                            <a href="#" type="button" class="btn-white btn btn"><i class="fa fa-edit"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Bearbeiten"></i></a>
                                            <button type="button" class="btn-white btn btn"><i class="fa fa-trash"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Löschen"></i></button>
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
    $(document).ready(function () {

        $('.footable').footable();


    });

</script>
@endsection
@include('admin.drawings.create')