@extends('layouts.admin-main')
@section('title', 'Online Voting Accounts')
@section('active')
    <h1>
        Admin Accounts
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="/admin/accounts/view">Account</a></li>
        <li class="active">Create</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Account</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.accounts.submit') }}" method="POST">
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
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter Username">
                            @error('username')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="" selected><-- SELECT ROLE --></option>
                                <option value="SYSTEM ADMINISTRATOR">SYSTEM ADMINISTRATOR</option>
                                <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                <option value="ELECTION OFFICER">ELECTION OFFICER</option>
                            </select>
                            @error('role')
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
