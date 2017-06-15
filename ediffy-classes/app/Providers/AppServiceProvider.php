<?php

namespace App\Providers;

use App\Models\Enquiry;
use App\Models\AdmissionInstallment;
use Illuminate\Support\ServiceProvider;
use App\Observers\EnquiryObserver;

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
