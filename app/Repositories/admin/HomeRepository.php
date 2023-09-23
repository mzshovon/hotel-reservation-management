<?php

namespace App\Repositories\admin;

use App\Http\CacheOps\VisitorManageFromCache;
use App\Http\Services\Utilities\UtilitiesService;
use App\Repositories\HomeRepositoryInterface;

class HomeRepository implements HomeRepositoryInterface
{

    public function __construct(private VisitorManageFromCache $visitorManageFromCache, private UtilitiesService $utilitiesService)
    {

    }

    public function getDashboardData()
    {
        $countInfo = $this->visitorManageFromCache->getVisitorInfo();
        $news = array_slice($this->utilitiesService->getNews(), 0, 5);
        return ["Dashboard", json_encode($countInfo), $news];
    }
}
