<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasApiTokens, HasFactory, HasRoles, InteractsWithMedia, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'phone_number',
        'status',
        'banned',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }


    public function schedules()
    {
        return $this->hasMany(DoctorShedule::class);
    }

    public function getAvailableSlotsForDate($date)
    {
        $dayOfWeek = date('l', strtotime($date)); // e.g., "Monday"

        // Retrieve regular weekly schedule for the specified day
        $schedule = $this->schedules()
            ->where('day', $dayOfWeek)
            ->where('is_available', true)
            ->first();

        if (!$schedule) {
            return ['availableSlots' => [], 'bookedSlots' => []];
        }

        // Generate all possible slots for the day
        $start = new \DateTime($schedule->start_time);
        $end = new \DateTime($schedule->end_time);
        $interval = new \DateInterval('PT30M'); // e.g., 30-minute intervals
        $slots = [];

        for ($time = clone $start; $time < $end; $time->add($interval)) {
            $slots[] = $time->format('H:i');
        }

        // Fetch booked slots for the user on the specified date
        $bookedSlots = Appointment::where('user_id', $this->id)
            ->where('appointment_date', $date)
            ->pluck('appointment_time')
            ->toArray();

        // Fetch exceptions for the specified date
        $exceptions = $this->schedules()
            ->where('exception_date', $date)
            ->where('is_available', false)
            ->get();

        // Filter out slots that fall within exception times
        foreach ($exceptions as $exception) {
            $exceptionStart = new \DateTime($exception->start_time);
            $exceptionEnd = new \DateTime($exception->end_time);

            $slots = array_filter($slots, function ($slot) use ($exceptionStart, $exceptionEnd) {
                $slotTime = new \DateTime($slot);
                return $slotTime < $exceptionStart || $slotTime >= $exceptionEnd;
            });
        }

        return [
            'availableSlots' => array_diff($slots, $bookedSlots),
            'bookedSlots' => $bookedSlots
        ];
    }
}
