<?php
/**
 * @File IAddressRepository.php
 * @author Satyapraneel <satypraneel.holla@costprize.com>
 * @since 03-Dec-15
 */

namespace App\Repositories\Address;


interface IAddressRepository {
    /**
     * @return mixed
     * @author Satyapraneel <satyapraneel.holla@costprize.com>
     */
    public function getAddress();

    public function getPlaceAddress($citiesId);
}