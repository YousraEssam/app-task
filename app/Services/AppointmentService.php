<?php
namespace App\Http\Services;

use App\Http\Repositories\AppointmentRepository;

class AppointmentService
{
    protected $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function createAppointment($req)
    {
        $this->appointmentRepository->createAppointment($req);
    }

}
