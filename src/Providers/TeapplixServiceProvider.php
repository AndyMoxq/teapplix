<?php

namespace ThankSong\Teapplix\Providers;

use Illuminate\Support\ServiceProvider;
use ThankSong\Teapplix\Teapplix;

class TeapplixServiceProvider extends ServiceProvider{
    public function boot(){
        $this->publishes([
            __DIR__.'/../../config/teapplix.php' => config_path('teapplix.php'),
        ], 'teapplix');
        
    }

    public function register(){
        $this->mergeConfigFrom(
            __DIR__.'/../../config/teapplix.php',
            'teapplix'
        );
        $this->app->singleton('teapplix', fn() => new Teapplix);
    }
}