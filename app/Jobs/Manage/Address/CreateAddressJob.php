<?php

namespace App\Jobs\Manage\Address;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateAddressJob extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $alpha_address;
    /**
     * @var
     */
    private $beta_address;

    /**
     * Create a new job instance.
     *
     * @param $alpha_address
     * @param $beta_address
     */
    public function __construct($alpha_address,$beta_address)
    {
        //
        $this->alpha_address = $alpha_address;
        $this->beta_address = $beta_address;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
