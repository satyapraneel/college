<?php namespace App\Jobs\Site\Favourites;

use App\Jobs\Job;

class StoreFavoritesJob extends Job
{

    /**
     * @var
     */
    public $collegeId;

    /**
     * @param $collegeId
     */
    public function __construct($collegeId)
    {
        $this->collegeId = $collegeId;
    }
}