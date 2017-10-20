<?php
namespace AGD\BootForm\Facades;
use Illuminate\Support\Facades\Facade;

class BootForm  extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'BootForm';
    }
}