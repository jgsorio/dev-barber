<?php

namespace App\Http\Resources;

use App\Models\BarberAvailability;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ShowBarberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'stars' => $this->stars,
            'avatar' => url($this->avatar),
            'reviews' => BarberReviewResource::collection($this->reviews),
            'photos' => BarberPhotoResource::collection($this->photos),
            'testimonials' => BarberTestimonialResource::collection($this->testimonials),
            'services' => BarberServiceResource::collection($this->services),
            'availabilities' => $this->parseAvailabilities($this->availabilities)
        ];
    }

    private function parseAvailabilities(Collection $availabilities): Collection
    {
        return $availabilities->map(function (BarberAvailability $availability) {
            return [
                'weekday' => $availability->weekday,
                'hours' => explode(',', $availability->hours),
            ];
        });
    }
}
