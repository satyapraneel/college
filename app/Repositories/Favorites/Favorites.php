<?php namespace App\Repositories\Favorites;

use App\Repositories\College\College;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    /**
     * @var string
     */
    protected $table = 'favorites';

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}