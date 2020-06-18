@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Appointment #').$appointment->id }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="doctors" class="col-md-4 col-form-label text-md-right">{{ __('Doctors') }}</label>
                        <p class="col-md-4 col-form-label text-md-left"> {{ $appointment->doctor->user->fname ." ". $appointment->doctor->user->lname }}</p>
                    </div>

                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Appointment Date') }}</label>
                        <p class="col-md-4 col-form-label text-md-left"> {{ $appointment->date }}</p>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {{-- <a href="{{ route('appointments.index') }}" class="btn btn-primary" style="float: right"> {{ __('Back') }}</a> --}}
                            <a href="{{ route('home') }}" class="btn btn-primary" style="float: right"> {{ __('Back') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
