<?php
/**
 * @File ImageRepository.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Jan-16
 */

namespace App\Repositories\Images;


class ImageRepository implements IImageRepository{
    /**
     * @var Images
     */
    private $images;

    /**
     * @param Images $images
     */
    function  __construct(Images $images){

        $this->images = $images;
    }
}