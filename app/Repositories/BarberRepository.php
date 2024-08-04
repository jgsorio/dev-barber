<?php

namespace App\Repositories;

use App\Models\Barber;
use Illuminate\Database\Eloquent\Collection;

class BarberRepository
{
    public function __construct(protected Barber $model) {}

    public function all(array $filter)
    {
         return $this->model->select(
            $this->model->raw('*, SQRT(
                POW(69.1 * (latitude - '. $filter["lat"] .'), 2) +
                POW(69.1 * (' . $filter["lng"] . ' - longitude) * COS(latitude / 57.3), 2)
            ) AS distance')
        )
            ->having('distance', '<=', 20)
            ->orderBy('distance', 'ASC')
            ->paginate();
    }

    public function find(int $id): ?Barber
    {
        return $this->model->where('id', $id)
            ->with(['photos', 'testimonials', 'services', 'reviews', 'availabilities'])
            ->firstOrFail();
    }

    public function getAppointments(int $id)
    {
        return $this->model->with(['appointments' => function ($query) {
            $query->whereBetween('appointment_date', [
                date('Y-m-d 00:00:00'),
                date('Y-m-d 23:59:59', strtotime('+30 days'))
            ]);
        }])
            ->first();
    }
}
