@extends('layouts.admin-main')
@section('title', 'Online Voting Accounts')
@section('active')
    <h1>
        Admin Accounts
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Account</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible">{{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                    @endif
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($account as $acc)
                                <tr>
                                    <td>{{ $acc->id }}</td>
                                    <td>{{ $acc->username }}</td>
                                    <td><span class="label bg-primary">{{ $acc->role }}</span></td>
                                    <td>
                                        @if ($acc->status == 1)
                                            <span class="label bg-green">ACTIVE</span>
                                        @else
                                            <span class="label bg-red">INACTIVE</span>
                                        @endif
                                    </td>
                                    <td>{{ $acc->created_at }}</td>
                                    <td>
                                        @if (Auth::user()->role == 'SYSTEM ADMINISTRATOR')
                                            <a href="/admin/accounts/edit/{{ $acc->id }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        @elseif(Auth::user()->role == 'ADMINISTRATOR')
                                            @if ($acc->role == 'SYSTEM ADMINISTRATOR')
                                            @elseif($acc->role == 'ADMINISTRATOR')
                                            @else
                                                <a href="/admin/accounts/edit/{{ $acc->id }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></a>
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
