<?php
    /**
     * @File CityRepository.php
     * @author Satyapraneel <satypraneel.holla@gmail.com>
     * @since 12-Jan-16
     */

    namespace App\Repositories\City;


    class CityRepository implements ICityRepository
    {
        /**
         * @var City
         */
        private $city;

        /**
         * @param City $city
         */
        function __construct(City $city)
        {

            $this->city = $city;
        }

        public function getAllCity()
        {
            return $this->city
                ->with('state')
                ->get();
        }
    }