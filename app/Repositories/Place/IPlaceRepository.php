<?php
/**
 * @File IPlaceRepository.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Jan-16
 */

namespace App\Repositories\Place;


interface IPlaceRepository {
    /**
     * @param $placeType
     * @return mixed
     * @author Satyapraneel <satyapraneel@gmail.com>
     */
    public function getPlacesByType($placeType);

    /**
     * @param $placeType
     * @return mixed
     * @author Satyapraneel <satyapraneel@gmail.com>
     */
    public function getPlaceAddress($placeType);

    /**
     * @param $placeId
     * @return mixed
     * @author Satyapraneel <satyapraneel@gmail.com>
     */
    public function getPlaceById($placeId);

    /**
     * @param $citiesId
     * @param $placeType
     * @return mixed
     * @author Satyapraneel <satyapraneel@gmail.com>
     */
    public function getPlaceByCity($citiesId, $placeType);
}