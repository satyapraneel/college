<?php namespace App\Repositories\College;


interface ICollegeRepository {
    /**
     * @param $id
     * @return mixed
     * @author Satyapraneel <satyapraneel.holla@costprize.com>
     */
    public function getCollegeById($id);

    /**
     * @param $sector
     * @return mixed
     * @author Satyapraneel <satyapraneel.holla@costprize.com>
     */
    public function getCollegeBySectorName($sector);

    /**
     * @param $city
     * @param $sector
     * @param $course
     * @return mixed
     * @author Satyapraneel <satyapraneel.holla@costprize.com>
     */
    public function getCollegeByCity($city,$sector, $course);

    public function getCollegeByCourseName($course);

}