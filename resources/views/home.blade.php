@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome, {{ Auth::user()->user_name}}
                    <br><br>
                    You are logged in!

                        <br>
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary" style="float: right">Add an appointment</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
