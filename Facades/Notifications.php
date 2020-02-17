<?php

namespace Grigio\Notifications\Facades;

use Illuminate\Support\Facades\Facade;

class Notifications extends Facade {
   protected static function getFacadeAccessor() { return 'notification'; }
}