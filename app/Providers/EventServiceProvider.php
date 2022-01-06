<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\Classday;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Observers\ActivityObserver;
use App\Observers\AttendanceObserver;
use App\Observers\ClassdayObserver;
use App\Observers\CourseObserver;
use App\Observers\GradeObserver;
use App\Observers\StudentObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Grade::observe(GradeObserver::class);
        Course::observe(CourseObserver::class);
        Activity::observe(ActivityObserver::class);
        Student::observe(StudentObserver::class);
        Classday::observe(ClassdayObserver::class);
        Attendance::observe(AttendanceObserver::class);
    }
}
