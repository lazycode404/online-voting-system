@extends('layouts.admin-main')
@section('title', 'Online Voting Election')
@section('active')
    <h1>
        Election
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="/admin/election/view">Election</a></li>
        <li class="active">Create</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Election</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('admin.election.update')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        @if (Session::get('error'))
                            <div class="alert alert-danger alert-dismissible">{{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif
                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible">{{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif
                        <input type="hidden" name="id" value="{{$election->election_id}}">
                        <div class="form-group">
                            <label for="electname">Election Name</label>
                            <input type="text" class="form-control" value="{{$election->election_name}}" id="electname" name="electname"
                                placeholder="Enter Election Name">
                            @error('electname')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="startdate">Start Date</label>
                            <input type="date" class="form-control" id="startdate" value="{{$election->stardate}}" name="startdate">
                            @error('startdate')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="enddate">End Date</label>
                            <input type="date" class="form-control" id="enddate" value="{{$election->enddate}}" name="enddate">
                            @error('enddate')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="/admin/election/view" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
