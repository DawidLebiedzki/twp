@extends('layouts.app')

@section('content-path')
    <div class="col-lg-10">
                    <h2>Adminitration</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Einstellungen</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">Benutzer</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ url()->current() }}"><strong>Profil</strong></a>
                        </li>
                    </ol>
                </div>
@endsection

@section('content')
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<div class="wrapper wrapper-content animated fadeInUp">
            <div class="row">
                <div class="col">

                </div>
                <div class="col-sm-6">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="m-b-md">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-white float-right">Editieren</a>

                                        <h1>Benutzer Profil</h1>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row m-b-lg">
                                <div class="col-2 m-l-xs">
                                    <div ><img alt="image" class="rounded-circle" src="{{ $user->getFirstMediaUrl('avatars') }}" height="100" width="100"></div>
                                    
                                </div>
                                <div class="col-6 float-left p-l-xs" >
                                    <h2>{{ $user->fname }} {{ $user->lname }}</h2>
                                    <h4>{{ implode(', ', $user->roles()->get()->pluck('displayed_name')->toArray()) }}</h4>
                                </div>
                                <div class="col">
                                    <p>Erstellt am: {{ $user->created_at->format('d.m.Y') }}</p>
                                    <p>Letzte Aktivität: {{ $user->updated_at->format('d.m.Y') }}</p>
                                </div>
                            </div>
                            
                            
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li><a class="nav-link active" href="#tab-1" data-toggle="tab">Personal Daten</a></li>
                                                    <li><a class="nav-link" href="#tab-2" data-toggle="tab">Last activity</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-1">
                                                   <div class="row p-b-xs">
                                                       <div class="col">
                                                            <h4>Personal Nummer:</h4>
                                                       </div>
                                                       <div class="col text-left">
                                                            <h5>{{ $user->username }}</h5>
                                                       </div>
                                                       <div class="col"></div>
                                                   </div>
                                                   <div class="row p-b-md">
                                                        <div class="col">
                                                            <h4>Abteilung:</h4>
                                                        </div>
                                                        <div class="col text-left">
                                                            <h5>{{ $user->depart_id }}</h5>
                                                        </div>
                                                        <div class="col"></div>
                                                   </div>
                                                 
                                                   
                                                   <div class="row m-t-xl ">
                                                        <div class="col text-left">
                                                            <h4>Adresse:</h4>
                                                            <hr>
                                                        </div>
                                                        
                                                   </div>
                                                   <div class="row p-b-xs">
                                                        <div class="col">
                                                            <address>
                                                                <strong>{{ $user->fname }} {{ $user->lname }}</strong>
                                                                <br>
                                                                {{ $user->street }} {{ $user->street_number }}
                                                                <br>
                                                                {{ $user->zip_code }} {{ $user->city }}
                                                            </address>
                                                        </div>
                                                        
                                                   </div>
                                                </div>
                                                <div class="tab-pane" id="tab-2">

                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Title</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Comments</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                            </td>
                                                            <td>
                                                                Create project in webapp
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                            </td>
                                                            <td>
                                                                Various versions
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                            </td>
                                                            <td>
                                                                There are many variations
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                            </td>
                                                            <td>
                                                                Latin words
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Latin words, combined with a handful of model sentence structures
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                            </td>
                                                            <td>
                                                                The generated Lorem
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                            </td>
                                                            <td>
                                                                The first line
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                            </td>
                                                            <td>
                                                                The standard chunk
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                            </td>
                                                            <td>
                                                                Lorem Ipsum is that
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                            </td>
                                                            <td>
                                                                Contrary to popular
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                                                                </p>
                                                            </td>

                                                        </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    
@endsection