<?php
//
//namespace App\Providers;
//
//use Illuminate\Bus\Dispatcher;
//use Illuminate\Support\ServiceProvider;
//
//class BusServiceProvider extends ServiceProvider
//{
//    /**
//     * Bootstrap the application services.
//     *
//     * @return void
//     */
//    public function boot(Dispatcher $dispatcher)
//    {
//        $dispatcher->mapUsing(
//            function ($command) {
//                return Dispatcher::simpleMapping(
//                    $command,
//                    'App\Jobs',
//                    'App\Handlers'
//                );
//            }
//        );
//    }
//
//    /**
//     * Register the application services.
//     *
//     * @return void
//     */
//    public function register()
//    {
//        //
//    }
//}
