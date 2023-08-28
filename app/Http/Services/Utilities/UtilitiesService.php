<?php

namespace App\Http\Services\Utilities;

use App\Repositories\UtilityServiceReporsitoryInterface;

class UtilitiesService implements UtilityServiceReporsitoryInterface {

    private $newsArrayTestData = [];

    public function __construct()
    {
        $this->newsArrayTestData = config("testdata.news");
    }

    public function getNews()
    {
        return $this->newsArrayTestData ?? []; //# For testing purpose
    }

    public function getSingleNews(int $newsId)
    {

    }

    public function getAboutUs()
    {

    }

    public function getContactUs()
    {

    }

    public function storeContactUs()
    {

    }

}
