@extends('layouts.admin-main')
@section('title', 'Online Voting System')
@section('active')
    <h1>
        Votes
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Votes</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        @foreach ($election as $election)
            @if ($votes->where('election', $election->election_id)->count() > 0)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box {{$election->status == 1 ? 'bg-green' : 'bg-red'}}">
                        <span class="info-box-icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Voted</span>
                            <a href="" style="color: white" class="info-box-text pull-right">
                                More info <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                            </a>
                            <span class="info-box-number">{{ $count_votes }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                {{ $election->election_name }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            @endif
        @endforeach
    </div>
@endsection
