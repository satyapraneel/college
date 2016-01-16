<?php
/**
 * @File AddressRepository.php
 * @author Satyapraneel <satypraneel.holla@costprize.com>
 * @since 03-Dec-15
 */

namespace App\Repositories\Address;


class AddressRepository implements IAddressRepository{
    /**
     * @var Address
     */
    private $address;

    /**
     * @param Address $address
     */
    public function __construct(Address $address){

        $this->address = $address;
    }

    /**
     * @return mixed
     * @author Satyapraneel <satyapraneel.holla@costprize.com>
     */
    public function getAddress()
    {
        return $this->address->distinct()->lists('city');
    }

    public function getPlaceAddress($citiesId){
        return  $this->address
                    ->whereIn('city_id', $citiesId)
               ->get(['street1','street2','lat','lang','place_id']);
    }
}