@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Benutzer</h5>

                            
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
                                    @foreach ($users as $user)
                                        <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray())  }}</td>
                                    
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn-primary btn btn-xs">Edit</button></a> 
                                                        <a href="{{ route('admin.users.destroy', $user->id) }}"><button type="button" class="btn-warning btn btn-xs">Delete</button></a></td>
                                                    </div>
                                                </td>
                                        
                                        </tr>
                                    @endforeach  
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