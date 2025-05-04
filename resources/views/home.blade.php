@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <!-- Displaying total users and products -->
                        <div class="mt-4">
                            <h4>Total Users: {{ $totalUsers }}</h4>
                            <h4>Total Products: {{ $totalProducts }}</h4> <!-- Example for total products -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
