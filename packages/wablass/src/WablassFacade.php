<?php
namespace Wablass;

use Illuminate\Support\Facades\Facade;

class WablassFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Wablass';
    }
}
?>
