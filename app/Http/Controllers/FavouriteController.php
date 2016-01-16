<?php namespace App\Http\Controllers;

use App\Http\Requests\Site\StoreFavouriteRequest;
use App\Jobs\Site\Favourites\StoreFavoritesJob;
use App\Repositories\Favorites\IFavoritesRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /**
     * @var IFavoritesRepository
     */
    private $repository;

    /**
     * @param IFavoritesRepository $repository
     */
    function __construct(IFavoritesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favourites = [];
        if(Auth::user()) {
            $favourites = $this->repository->all();
        }
        return view('college.favourite-list')
            ->with('favourites', $favourites)
            ->render();
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
    public function store(StoreFavouriteRequest $request)
    {
//        $this->dispatchFrom(StoreFavoritesJob::class, $request);
        if (!Auth::check()) {
            return 'false';
        }
        $result = $this->repository->store($request);

        return $result ? 'true' : 'false';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
}
