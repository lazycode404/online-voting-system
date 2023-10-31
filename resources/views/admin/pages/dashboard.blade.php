@extends('layouts.admin-main')
@section('title', 'Online Voting System Dashboard')
@section('active')
    <h1>
        Overview
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
@endsection
@section('content')
    @if ($count_active > 0)
        <div class="row justify-content-center">
            <h1 class="page-header text-center title"><b>{{ $election[0]->election_name }}</b></h1>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $voted }}</h3>

                        <p>VOTED</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $notvoted }}</h3>

                        <p>NOT VOTED</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($positions as $position)
                @if ($candidates->where('position', $position->position_id)->count() > 0)
                    <div class="col-sm-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <b>{{ $position->position_name }}</b>
                            </div>
                            <div class="box-body" style="height: 250px; overflow-y: auto;">
                                @foreach ($candidates->where('position', $position->position_id) as $candidate)
                                    @php
                                        $candidateVotes = DB::table('votes')
                                            ->where('position', $position->position_id)
                                            ->where('candidate', $candidate->id)
                                            ->count();

                                        $totalVotesForPosition = DB::table('votes')
                                            ->where('position', $position->position_id)
                                            ->count();
                                        $percentage = $totalVotesForPosition > 0 ? ($candidateVotes / $totalVotesForPosition) * 100 : 0;
                                    @endphp

                                    <p>{{ $candidate->lname . ', ' . $candidate->fname . ' ' . substr($candidate->mname, 0, 1) }}
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"
                                            aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ number_format($percentage, 2) }}%</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <h1 class="page-header text-center title"><b>NO ACTIVE ELECTION</b></h1>
    @endif

@endsection
