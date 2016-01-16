<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Address\IAddressRepository',
            'App\Repositories\Address\AddressRepository'
        );

        $this->app->bind(
            'App\Repositories\College\ICollegeRepository',
            'App\Repositories\College\CollegeRepository'
        );

        $this->app->bind(
            'App\Repositories\Course\ICourseRepository',
            'App\Repositories\Course\CourseRepository'
        );

        $this->app->bind(
            'App\Repositories\Favorites\IFavoritesRepository',
            'App\Repositories\Favorites\FavoritesRepository'
        );

        $this->app->bind(
            'App\Repositories\Images\IImageRepository',
            'App\Repositories\Images\ImageRepository'
        );

        $this->app->bind(
            'App\Repositories\Place\IPlaceRepository',
            'App\Repositories\Place\PlaceRepository'
        );

        $this->app->bind(
            'App\Repositories\PlaceType\IPlaceTypeRepository',
            'App\Repositories\PlaceType\PlaceTypeRepository'
        );

        $this->app->bind(
            'App\Repositories\City\ICityRepository',
            'App\Repositories\City\CityRepository'
        );
    }
}
