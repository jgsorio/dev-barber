<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barber extends Model
{
    use HasFactory;

    public function photos(): HasMany
    {
        return $this->hasMany(BarberPhoto::class);
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(BarberTestimonial::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(BarberService::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(BarberReview::class);
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(BarberAvailability::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(UserAppointment::class);
    }
}
