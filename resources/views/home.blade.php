@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="page-header text-center title"><b>{{ $election[0]->election_name }}</b></h1>
            <div class="col-md-8">
                <form action="{{ route('submit.vote') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ballot_no" value="{{ rand(100000, 999999) }}">
                    <input type="hidden" name="election_id" value="{{ $election[0]->election_id }}">
                    @foreach ($positions as $position)
                        @if ($candidates->where('position', $position->position_id)->count() > 0)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>{{ $position->position_name }}</strong>
                                    <span class="float-end">
                                        <button type="button" class="btn btn-success btn-sm btn-flat reset"
                                            data-desc=""><i class="fa fa-refresh"></i> Reset</button>
                                    </span>
                                </div>
                                @foreach ($candidates->where('position', $position->position_id) as $candidate)
                                    <div class="card-body">
                                        <div id="candidate_list">
                                            <ul class="list-group">
                                                <div class="d-flex align-items-center">
                                                    @if ($position->max_vote > 1)
                                                        <input type="checkbox"
                                                            class="form-check-input me-2 position-checkbox"
                                                            name="votes[{{ $position->position_id }}][]"
                                                            value="{{ $candidate->id }}" id="checkbox"
                                                            data-position-id="{{ $position->position_id }}"
                                                            data-max-votes="{{ $position->max_vote }}">
                                                    @else
                                                        <input type="radio" class="form-check-input me-2 position-radio"
                                                            name="votes[{{ $position->position_id }}][]"
                                                            value="{{ $candidate->id }}" id="radio">
                                                    @endif
                                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm me-2"
                                                        id="show-platform"
                                                        data-url="{{ route('candidate.platform', $candidate->id) }}">
                                                        <i class="fa fa-search"></i> Platform
                                                    </a>
                                                    <img src="{{ asset('assets/images/candidate/' . $candidate->image) }}"
                                                        alt="Profile Image" class="img-thumbnail me-2" width="100"
                                                        height="100">
                                                    <span
                                                        class="cname me-2"><strong>{{ $candidate->lname . ', ' . $candidate->fname . ' ' . substr($candidate->mname, 0, 1) }}</strong></span>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card-footer">
                                    You may select up to: {{ $position->max_vote }} candidates
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-flat" name="vote">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Candidate Platform</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="id">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.position-checkbox').on('change', function() {
                var maxVotes = parseInt($(this).data('max-votes'));
                var positionid = $(this).data('position-id')
                var checkedCheckboxes = $(`.position-checkbox[data-position-id="${positionid}"]:checked`);
                if (checkedCheckboxes.length > maxVotes) {
                    $(this).prop('checked', false);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', '#show-platform', function() {
                var platformURL = $(this).data('url');
                $.get(platformURL, function(data) {
                    $('#exampleModal').modal('show');
                    $('#id').html(data.platform);
                })
            })
        })
    </script>
@endsection
