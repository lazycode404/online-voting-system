@extends('layouts.admin-main')
@section('title', 'Online Voting System')
@section('active')
    <h1>
        Settings
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
    </ol>
@endsection
<style>
    textarea {
        resize: none;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
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
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center"><strong>CHANGE PASSWORD</strong></h3>
                    <hr>
                    <form action="{{ route('admin.settings.password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="newpass">New Password</label>
                            <input type="password" class="form-control" id="newpass" name="newpass"
                                placeholder="Enter new password">
                            @error('newpass')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="conpass">Confirm Password</label>
                            <input type="password" class="form-control" id="conpass" name="conpass"
                                placeholder="Confirm password">
                            @error('conpass')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sms" data-toggle="tab">SMS</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="sms">
                        <div class="box">
                            <div class="box-body">
                                <div>
                                    <p>SMS Application API Key</p>
                                </div>
                                <div class="form-group">
                                    <label for="apikey">API KEY</label>
                                    <input type="password" class="form-control" id="apikey" name="apikey"
                                        placeholder="Enter new password">
                                    @error('apikey')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn btn-sm btn-success pull-right">Save</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box">
                                    <div class="box-body">
                                        <div>
                                            <p><strong>CONSTANTS</strong></p>
                                        </div>
                                        <div>
                                            <p><Strong>{voter}</Strong> - Voter's Name</p>
                                            <p><Strong>{startdate}</Strong> - Election Start Date</p>
                                            <p><strong>{enddate}</strong> - Election End Date</p>
                                            <p><strong>{code}</strong> - Voter's Code to Login</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="box">
                                    <div class="box-body">
                                        <form action="{{route('admin.settings.submitsms')}}" method="POST">
                                            @csrf
                                            <p>SMS TEMPLATE</p>
                                            <div class="form-group">
                                                <label for="templatename">Description</label>
                                                <input type="text" class="form-control" id="templatename"
                                                    name="templatename" placeholder="Enter template name">
                                                @error('templatename')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="template">Message</label>
                                                <textarea class="form-control" id="text" name="template" maxlength="160" placeholder="Type in your message"
                                                    rows="5"></textarea>
                                                <small class="pull-right" id="count_message"></small>
                                                @error('template')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-sm btn-success">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            var text_max = 160;
            $('#query_count_message').html('0 / ' + text_max);

            $('#query').keyup(function() {
                var text_length = $('#query').val().length;
                var text_remaining = text_max - text_length;

                $('#query_count_message').html(text_length + ' / ' + text_max);
            });
        });

        $(function() {
            var text_max = 160;
            $('#count_message').html('0 / ' + text_max);

            $('#text').keyup(function() {
                var text_length = $('#text').val().length;
                var text_remaining = text_max - text_length;

                $('#count_message').html(text_length + ' / ' + text_max);
            });
        });
    </script>
@endsection
