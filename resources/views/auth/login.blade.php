@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Voter\'s Login') }}</div>

                    <div class="card-body">
                        @if (Session::get('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @elseif(Session::get('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                                <div class="col-md-6">
                                    <input id="code" type="text"
                                        class="form-control @error('code') is-invalid @enderror" name="code"
                                        value="{{ old('code') }}" required autocomplete="code" autofocus>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-1">

                                <div class="col-md-6">
                                    <input id="password" type="hidden"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="123456789">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
