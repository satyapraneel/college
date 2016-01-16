<?php namespace App\Repositories\College;


class CollegeRepository implements ICollegeRepository
{
    private $college;

    /**
     * @param College $college
     */
    function __construct(College $college)
    {

        $this->college = $college;
    }

    public function getCollegeById($id)
    {
        $relation = ['address'];
        return $this->college
            ->join('address', 'address.college_id', '=', 'college.id')
            ->where('college.id', '=', $id)->first();
    }

    /**
     * @param $sector
     * @return mixed
     * @author Satyapraneel <satyapraneel.holla@costprize.com>
     */
    public function getCollegeBySectorName($sector)
    {
        $relation = ['address'];

        return $this->college
            ->with($relation)
            ->where('sector', $sector)
            ->get();
    }

    /**
     * @param $city
     * @param $sector
     * @param $course
     * @return mixed
     * @author Satyapraneel <satyapraneel.holla@costprize.com>
     */
    public function getCollegeByCity($city, $sector, $course)
    {
        $college  = $this->college
            ->join('courses','courses.college_id', '=', 'college.id')
            ->join('address', 'address.college_id', '=', 'college.id');
            if(!empty($sector)) {
                $college->whereIn('college.sector', $sector);
            }
            if (!empty($city)) {
                $college->whereIn('address.city', $city);
            }
            $college->where('courses.course', '=', $course);

        return $college->get(['college.*']);
    }

    public function getCollegeByCourseName($course){
        return $this->college
            ->join('courses','courses.college_id', '=', 'college.id')
            ->where('courses.course', '=' ,$course)
            ->get(['college.*','courses.course']);
    }
}