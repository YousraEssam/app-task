<?php
namespace App\Http\Repositories;

use App\Models\Appointment;

class AppointmentRepository
{
    public function createAppointment($req)
    {
        return Appointment::create([
            'patient_id' => Auth::user()->patient->id,
            'doctor_id' => $req->doctor_id,
            'date' => $req->date,
        ]);
    }
}
