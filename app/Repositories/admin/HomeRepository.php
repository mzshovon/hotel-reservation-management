<?php

namespace App\Repositories\admin;

use App\Http\CacheOps\VisitorManageFromCache;
use App\Repositories\HomeRepositoryInterface;

class HomeRepository implements HomeRepositoryInterface
{

    public function __construct(private VisitorManageFromCache $visitorManageFromCache)
    {

    }

    public function getDashboardData()
    {
        $countInfo = $this->visitorManageFromCache->getVisitorInfo();
        return ["Dashboard", $countInfo];
    }
}
