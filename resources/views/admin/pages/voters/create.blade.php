@extends('layouts.admin-main')
@section('title', 'Online Voting Accounts')
@section('active')
    <h1>
        Voters
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="/admin/voter/view">Voters</a></li>
        <li class="active">Create</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with border">
                    <h3 class="box-title">
                        Create Voters
                    </h3>
                </div>
                <form action="{{route('admin.voter.submit')}}" method="POST">
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
                        <div class="form-group">
                            <label for="fname">Firstname</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                placeholder="Enter First Name">
                            @error('fname')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lname">Lastname</label>
                            <input type="text" class="form-control" id="lname" name="lname"
                                placeholder="Enter Last Name">
                            @error('lname')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mname">Middlename</label>
                            <input type="text" class="form-control" id="mname" name="mname"
                                placeholder="Enter Middle Name">
                            @error('mname')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" id="" cols="30" rows="5"></textarea>
                            @error('address')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cellnum">Cellphone Number</label>
                            <input type="number" class="form-control" id="cellnum" name="cellnum"
                                placeholder="Enter Cellphone number">
                            @error('cellnum')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="elec_id">Election</label>
                            <select class="form-control" id="elec_id" name="elec_id">
                                <option value="" selected><-- SELECT ELECTION --></option>
                                @foreach ($election as $elec)
                                    <option value="{{ $elec->election_id }}">{{ $elec->election_name }}</option>
                                @endforeach
                            </select>
                            @error('elec_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
