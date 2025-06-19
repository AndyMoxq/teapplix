<?php

namespace ThankSong\Teapplix\Facades;
use Illuminate\Support\Facades\Facade;

class Teapplix extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'teapplix';
    }
}