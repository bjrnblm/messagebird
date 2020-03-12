<?php

namespace Bjrnblm\Messagebird\Facades;

use Illuminate\Support\Facades\Facade;

class Messagebird extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'messagebird';
    }
}
