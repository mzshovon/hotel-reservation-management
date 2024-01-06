<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\UtilityServiceReporsitoryInterface;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    private UtilityServiceReporsitoryInterface $utilityServiceReporsitoryInterface;

    public function __construct(UtilityServiceReporsitoryInterface $utilityServiceReporsitoryInterface)
    {
        $this->utilityServiceReporsitoryInterface = $utilityServiceReporsitoryInterface;
    }

    public function getContactUs()
    {
        return view('frontend.utilityPages.contactUs');
    }
    public function storeContactUs(Request $request)
    {
        # code...
    }
    public function getAboutUs()
    {
        return view('frontend.utilityPages.aboutUs');
    }
    public function getNews()
    {
        $data['newsData'] = customPaginate($this->utilityServiceReporsitoryInterface->getNews(), 5);
        return view('frontend.utilityPages.news', $data);
    }
    public function getSingleNews($newsId)
    {
        # code...
    }
}
