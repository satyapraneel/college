<?php namespace App\Repositories\Favorites;


interface IFavoritesRepository
{
    /**
     * @param $favorite
     * @return mixed
     */
    public function store($favorite);

    /**
     * @return mixed
     */
    public function all();
}