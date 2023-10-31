@extends('layouts.admin-main')
@section('title', 'Online Voting Election')
@section('active')
    <h1>
        Election List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Election</li>
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
                                <th>Election Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($election as $elect)
                                <tr>
                                    <td>{{ $elect->election_id }}</td>
                                    <td>{{ $elect->election_name }}</td>
                                    <td>{{ date('F d, Y', strtotime($elect->stardate)) }}</td>
                                    <td>{{  date('F d, Y', strtotime($elect->enddate)) }}</td>
                                    <td>
                                        @if ($elect->status == 1)
                                            <span class="label bg-green">ACTIVE</span>
                                        @else
                                            <span class="label bg-red">INACTIVE</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/election/edit/{{ $elect->election_id }}"
                                            class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></a>
                                        @if ($elect->status == 1)
                                            <button class="btn btn-sm btn-danger"
                                                onclick="showstop({{ $elect->election_id }})">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-success"
                                                onclick="showModal({{ $elect->election_id }})">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Start Election</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to start this election?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <form action="{{ route('admin.election.start') }}" method="POST">
                        @csrf
                        <input type="hidden" id="elect_id" name="elect_id">
                        <button type="submit" class="btn btn-primary">Yes! Start</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-default2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Stop Election</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to stop this election?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <form action="{{ route('admin.election.stop') }}" method="POST">
                        @csrf
                        <input type="hidden" id="elect_id2" name="elect_id2">
                        <button type="submit" class="btn btn-danger">Yes! Stop</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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

        function showModal(id) {
            // Display the modal when the button is clicked
            document.getElementById('elect_id').value = id;
            $('#modal-default').modal('show');
        }
        function showstop(id2) {
            // Display the modal when the button is clicked
            document.getElementById('elect_id2').value = id2;
            $('#modal-default2').modal('show');
        }
    </script>
@endsection
