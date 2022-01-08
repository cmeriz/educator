<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Pensum;
use App\Policies\CoursePolicy;
use App\Policies\LessonPolicy;
use App\Policies\PensumPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Course::class => CoursePolicy::class,
        Pensum::class => PensumPolicy::class,
        Lesson::class => LessonPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
