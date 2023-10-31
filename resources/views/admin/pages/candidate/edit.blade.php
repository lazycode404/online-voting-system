@extends('layouts.admin-main')
@section('title', 'Online Voting Candidate')
@section('active')
    <h1>
        Election
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="/admin/candidate/view">Candidate</a></li>
        <li class="active">Edit</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Candidate</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('admin.candidate.update')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" value="{{$candidate->id}}" name="cand_id">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            @error('photo')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fname">First name</label>
                            <input type="text" class="form-control" value="{{$candidate->fname}}" id="fname" name="fname"
                                placeholder="Enter First name">
                            @error('fname')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lname">Last name</label>
                            <input type="text" class="form-control" value="{{$candidate->lname}}" id="lname" name="lname"
                                placeholder="Enter Last name">
                            @error('lname')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mname">Middle name</label>
                            <input type="text" class="form-control" value="{{$candidate->mname}}" id="mname" name="mname"
                                placeholder="Enter Middle name">
                            @error('mname')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="suffix">Suffix</label>
                            <input type="text" class="form-control" id="suffix" value="{{$candidate->suffix}}" name="suffix"
                                placeholder="Enter Suffix">
                            @error('suffix')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pos_id">Position</label>
                                <select class="form-control" id="pos_id" name="pos_id">
                                    @foreach ($position as $pos)
                                        <option value="{{ $pos->position_id }}" {{ $pos->position_id == $candidate->position ? 'selected' : '' }}>
                                            {{ $pos->position_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pos_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="elec_id">Election</label>
                                <select class="form-control" id="elec_id" name="elec_id">
                                    @foreach ($election as $elec)
                                        <option value="{{ $elec->election_id }}" {{ $elec->election_id == $candidate->election ? 'selected' : '' }}>
                                            {{ $elec->election_name }}</option>
                                    @endforeach
                                </select>
                                @error('elec_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="plat">Platform</label>
                                <textarea id="editor1" name="editor1" rows="10" cols="80">
                                    {{$candidate->platform}}
                                 </textarea>
                                 @error('editor1')
                                 <span class="invalid-feedback text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                            </div>
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
@section('scripts')
    <script>
          $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
  })
    </script>
@endsection
