<?php

namespace App\Providers;

use App\Models\Admission;
use App\Models\Enquiry;
use App\Models\AdmissionInstallment;
use App\Observers\FeesObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\EnquiryObserver;
use App\Observers\AdmissionObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Enquiry::observe(EnquiryObserver::class);
        AdmissionInstallment::observe(FeesObserver::class);
        Admission::observe(AdmissionObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
