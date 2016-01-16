<?php
/**
 * @File PlaceTypeRepository.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Jan-16
 */

namespace App\Repositories\PlaceType;


class PlaceTypeRepository implements IPlaceTypeRepository{
    /**
     * @var PlaceType
     */
    private $placeType;

    /**
     * @param PlaceType $placeType
     */
    function __construct(PlaceType $placeType){

        $this->placeType = $placeType;
    }
}