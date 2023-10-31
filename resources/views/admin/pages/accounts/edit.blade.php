@extends('layouts.admin-main')
@section('title', 'Online Voting Accounts')
@section('active')
    <h1>
        Admin Accounts
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="/admin/accounts/view">Account</a></li>
        <li class="active">Edit</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Account</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.accounts.update') }}" method="POST">
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
                        <input type="hidden" name="id" value="{{$account->id}}">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter Username" value="{{$account->username}}">
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
                                <option value="SYSTEM ADMINISTRATOR" {{$account->role=='SYSTEM ADMINISTRATOR' ? 'selected' : ''}}>SYSTEM ADMINISTRATOR</option>
                                <option value="ADMINISTRATOR" {{$account->role=='ADMINISTRATOR' ? 'selected' : ''}}>ADMINISTRATOR</option>
                                <option value="ELECTION OFFICER" {{$account->role=='ELECTION OFFICER' ? 'selected' : ''}}>ELECTION OFFICER</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{$account->status=='1' ? 'selected' : ''}}>ACTIVE</option>
                                <option value="2" {{$account->status=='2' ? 'selected' : ''}}>INACTIVE</option>
                            </select>
                            @error('status')
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
