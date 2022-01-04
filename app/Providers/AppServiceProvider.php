<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $slider = Slider::latest()->first();
        $contact = Contact::first();

        view()->share(['slider' => $slider, 'contact' => $contact]);
    }
}
