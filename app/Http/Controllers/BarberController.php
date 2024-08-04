<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarberAppointmentResource;
use App\Http\Resources\BarberResource;
use App\Http\Resources\ShowBarberResource;
use App\Repositories\BarberRepository;
use App\Services\MapsService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BarberController extends Controller
{
    public function __construct(
        protected BarberRepository $barberRepository,
    ) {}

    /**
     * @throws GuzzleException
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $address = $request->get('address', 'São Paulo');
        $result = MapsService::search($address);
        $barbers = $this->barberRepository->all($result);
        return BarberResource::collection($barbers);
    }

    public function show(int $id): ShowBarberResource
    {
        $barber = $this->barberRepository->find($id);
        return new ShowBarberResource($barber);
    }

    public function appointments(int $id): AnonymousResourceCollection
    {
        $barber = $this->barberRepository->getAppointments($id);
        return BarberAppointmentResource::collection($barber->appointments);
    }
}
