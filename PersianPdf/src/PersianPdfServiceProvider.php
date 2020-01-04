<?php
namespace PersianPdf\src;


use Illuminate\Support\ServiceProvider;
use PersianPdf\src\library\TCPDF;

/**
 * Created by PhpStorm.
 * User: xalil
 * Date: 1/4/20
 * Time: 11:47 AM
 */

class PersianPdfServiceProvider extends ServiceProvider
{


    public function boot(){

        $this->publishes([
            __DIR__ . '/config/PersianPdfConfig.php' => config_path('PersianPdf.php'),
        ]);

    }

    public function register()
    {
        $this->app->bind("PersianPdf\src\PersianPdf", function ($app) {
            return new PersianPdf(new TCPDF());
        });


    }

    public function provides()
    {
        return [PersianPdf::class];
    }

}