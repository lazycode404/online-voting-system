@extends('layouts.admin-main')
@section('title', 'Online Voting Election')
@section('active')
    <h1>
        Position List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Position</li>
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
                                <th>Position</th>
                                <th>Max Vote</th>
                                <th>Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($position as $pos)
                                <tr>
                                    <td>{{ $pos->position_id }}</td>
                                    <td>{{ $pos->position_name }}</td>
                                    <td>{{ $pos->max_vote }}</td>
                                    <td>
                                        @if ($pos->status == 1)
                                            <span class="label bg-green">ACTIVE</span>
                                        @else
                                            <span class="label bg-red">INACTIVE</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/position/edit/{{ $pos->position_id }}"
                                            class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></a>
                                        <button class="btn btn-sm btn-danger" onclick="showDelete({{ $pos->position_id }})">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        @if ($pos->status == 1)
                                            <button class="btn btn-sm btn-danger"
                                            onclick="disable({{ $pos->position_id }})">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-success"
                                            onclick="enable({{ $pos->position_id }})">
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
                    <h4 class="modal-title">Delete Position</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this position?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <form action="{{route('admin.position.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" id="posid" name="posid">
                        <button type="submit" class="btn btn-danger">Yes! Delete</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="disable-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Position</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to disable this position?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <form action="{{route('admin.position.disable')}}" method="POST">
                        @csrf
                        <input type="hidden" id="pos_id" name="pos_id">
                        <button type="submit" class="btn btn-primary">Yes! Disbale</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="enable-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Position</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to enable this position?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <form action="{{route('admin.position.enable')}}" method="POST">
                        @csrf
                        <input type="hidden" id="positionid" name="positionid">
                        <button type="submit" class="btn btn-primary">Yes! Enable</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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

        function showDelete(id) {
            // Display the modal when the button is clicked
            document.getElementById('posid').value = id;
            $('#modal-default').modal('show');
        }

        function disable(id) {
            // Display the modal when the button is clicked
            document.getElementById('pos_id').value = id;
            $('#disable-modal').modal('show');
        }

        function enable(id){
            document.getElementById('positionid').value = id;
            $('#enable-modal').modal('show');
        }
    </script>
@endsection
