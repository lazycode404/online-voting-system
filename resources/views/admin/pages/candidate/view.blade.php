@extends('layouts.admin-main')
@section('title', 'Online Voting Accounts')
@section('active')
    <h1>
        Candidate List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Candidate</li>
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
                                <th width="75">Photo</th>
                                <th>Fullname</th>
                                <th>Position</th>
                                <th>Election</th>
                                <th>Platform</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidate as $cand)
                                <tr>
                                    <td><img class="img-box" src="{{ asset('assets/images/candidate/' . $cand->image) }}"
                                            width="70" height="50" alt=""></td>
                                    <td><strong>{{ $cand->lname . ', ' . $cand->fname . ' ' . substr($cand->mname, 0, 1) }}</strong>
                                    </td>
                                    <td>{{ $cand->position_name }}</td>
                                    <td>{{ $cand->election_name }}</td>
                                    <td><a href="javascript:void(0)" id="show-platform"
                                        data-url="{{ route('admin.candidate.platform', $cand->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fa fa-search" aria-hidden="true"></i> View Platform
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/candidate/edit/{{$cand->id}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></a>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
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
                    <h4 class="modal-title">Candidate Platform</h4>
                </div>
                <div class="modal-body">
                    <div id="id">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
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
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(document).ready(function() {
            $('body').on('click', '#show-platform', function() {
                var platformURL = $(this).data('url');
                $.get(platformURL, function(data) {
                    $('#modal-default').modal('show');
                    $('#id').html(data.platform);
                })
            })
        })
    </script>
@endsection
