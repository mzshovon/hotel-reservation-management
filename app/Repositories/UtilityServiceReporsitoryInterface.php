<?php

namespace App\Repositories;

interface UtilityServiceReporsitoryInterface
{
    public function getNews();
    public function getSingleNews(int $newsId);
    public function getAboutUs();
    public function getContactUs();
    public function storeContactUs();
}
