<?php
namespace Wablass;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class WablassServiceProvider extends ServiceProvider
{
    /**
     * Bootstarp the application services.
     *
     * @return void
     */

     public function boot()
     {

     }

     /**
      * Register the application services.
      *
      *@return void
      */

      public function register()
      {
          App::bind('Wablass',function(){
            return new Wablass;
          });
      }
}

?>
