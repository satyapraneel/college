<?php namespace App\Handlers\Site\Favourites;


use App\Jobs\Site\Favourites\StoreFavoritesJob;
use App\Repositories\Favorites\IFavoritesRepository;

/**
 * @File StoreFavoriteJobHandler.php
 * @author Dileep <dileep.dv@costprize.com>
 * @since 12/23/2015
 */
class StoreFavoriteJobHandler
{
    /**
     * @var IFavoritesRepository
     */
    private $favorites;

    /**
     * @param IFavoritesRepository $favorites
     */
    function __construct(IFavoritesRepository $favorites)
    {
        $this->favorites = $favorites;
    }

    public function handle(StoreFavoritesJob $job)
    {
        dd($job->collegeId);
    }

}