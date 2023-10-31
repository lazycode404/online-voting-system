@extends('layouts.admin-main')
@section('title', 'Online Voting Accounts')
@section('active')
    <h1>
        Voters
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Voter</li>
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
                                <th>Code</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Middlename</th>
                                <th>Address</th>
                                <th>Cellphone Number</th>
                                <th>Election</th>
                                <th>Status</th>
                                <th>Date Voted</th>
                                <th width="80">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($voters as $row)
                                <tr>
                                    <td><b>{{$row->code}}</b></td>
                                    <td>{{$row->voter_fname}}</td>
                                    <td>{{$row->voter_lname}}</td>
                                    <td>{{$row->voter_mname}}</td>
                                    <td>{{$row->voter_address}}</td>
                                    <td>{{$row->voter_cellnum}}</td>
                                    <td>{{$row->election_name}}</td>
                                    <td>
                                        @if($row->voter_status == 0)
                                        <span class="label bg-red">ABSTENTION</span>
                                        @else
                                        <span class="label bg-green">VOTED</span>
                                        @endif
                                    </td>
                                    <td>{{$row->voter_datevoted}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
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
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
