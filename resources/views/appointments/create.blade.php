@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add an Appointment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="doctors" class="col-md-4 col-form-label text-md-right">{{ __('Doctors') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="doctor_id">
                                    @foreach($doctors as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->user->fname ." ". $doctor->user->lname}}</option>
                                    @endforeach
                                </select>

                                @error('doctor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Appointment Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date">
                                {{-- <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div> --}}

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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

@section('extra-scripts')
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#datetimepicker1').datetimepicker();
    // });
</script>
@endsection
