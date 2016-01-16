<?php namespace App\Repositories\Favorites;


use Illuminate\Support\Facades\Auth;

class FavoritesRepository implements IFavoritesRepository
{
    /**
     * @var Favorites
     */
    private $favorites;

    /**
     * @param Favorites $favorites
     */
    function __construct(Favorites $favorites)
    {
        $this->favorites = $favorites;
    }

    /**
     * @param $favorite
     * @return mixed
     */
    public function store($favorite)
    {
        $favorites = $this->exists(Auth::user()->id, $favorite->collegeId);
        if (!is_null($favorites)) {
            return $favorites;
        }
//        dd($favorite);
        return $this->favorites->insert(
            [
                'college_id' => $favorite->collegeId,
                'user_id'    => Auth::user()->id,
                'place_id'   => '',
                'status'     => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }

    public function exists($user_id, $college_id)
    {
        return $this->favorites
            ->where('user_id', '=', $user_id)
            ->where('college_id', '=', $college_id)
            ->first();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->favorites
            ->with(['college'])
            ->where('user_id', '=', Auth::user()->id)
            ->get();
    }
}