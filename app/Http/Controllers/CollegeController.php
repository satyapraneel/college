<?php

namespace App\Http\Controllers;

use App\Repositories\Address\IAddressRepository;
use App\Repositories\College\ICollegeRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CollegeController extends Controller
{
    /**
     * @var College
     */
    private $college;
    /**
     * @var IAddressRepository
     */
    private $address;

    /**
     * @param ICollegeRepository $college
     * @param IAddressRepository $address
     */
    public function __construct(ICollegeRepository $college, IAddressRepository $address)
    {

        $this->college = $college;
        $this->address = $address;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collegeCourse = Input::get('course');
        $sectors = Input::get('sector');
        $sector = [];
        if (!empty($sectors)) {
            foreach ($sectors as $key => $value) {
                $sector[] = $key;
            }
        }
        $address = Input::get('cityValues');
        $colleges = $this->college->getCollegeByCity($address, $sector, $collegeCourse);
        return view('college.college_list')->with(compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $courseName
     * @return \Illuminate\Http\Response
     */
    public function show($courseName)
    {
        //
        $colleges = $this->college->getCollegeByCourseName($courseName);
        $address = $this->address->getAddress();
        if (count($colleges)) {
            return view('college.index')
                ->with('colleges', $colleges)
                ->with('address', $address);
        }
        return Redirect::back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showModal()
    {
        $id = Input::get('collegeId');
        $college = $this->college->getCollegeById($id);
        return response()->json(
            [
                'collegeId'      => $college->id,
                'collegeName'    => $college->name,
                'collegeDetail'  => $college->detail,
                'collegeImage'   => $college->image,
                'collegeSource'  => $college->source,
                'collegeStreet1' => $college->street1,
                'collegeStreet2' => $college->street2,
                'collegeCity'    => $college->city,
                'collegeState'   => $college->state,
                'collegePincode' => $college->pincode,
                'token'          => csrf_token(),
                'action'         => url('favourite/store')
            ]
        );
//        return view('college.college_modal')->with(compact('college'));
    }

}
