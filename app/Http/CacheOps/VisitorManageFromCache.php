<?php

namespace App\Http\CacheOps;

use App\Http\Enums\FeatureEnum;
use Illuminate\Support\Facades\Cache;

class VisitorManageFromCache {

    const VISITOR_ROOT_SCHEMA_NAME = "site_visitors";
    const VISITORS_INDEX_NAME = "visitors";

    public function __construct()
    {

    }

    /**
     * @param string $ip
     * @param string $featureName
     *
     * @return void
     */
    public function storeVisitorInfo(string $ip, string $featureName) : void
    {
        if(Cache::has(self::VISITOR_ROOT_SCHEMA_NAME)) {
            $this->checkVisitorInfo($ip, $featureName);
        } else {
            $this->setNewSchemaForVisitors($ip, $featureName);
        }
    }

    /**
     * @param string $ip
     * @param string $featureName
     *
     * @return mixed
     */
    private function checkVisitorInfo(string $ip, string $featureName)
    {
        $getRootSchema = Cache::get(self::VISITOR_ROOT_SCHEMA_NAME);
        return $this->filterAndAddOrUpdateSchema($this->parseRootSchema($getRootSchema), $ip, $featureName);
    }

    private function parseRootSchema($encodedSchema)
    {
        return json_decode($encodedSchema, true);
    }

    /**
     * @param array $parsedSchema
     * @param string $ip
     * @param string $featureName
     *
     * @return mixed
     */
    private function filterAndAddOrUpdateSchema(array $parsedSchema, string $ip, string $featureName)
    {
        $parsedSchema['total_visitors'] += 1;
        if(array_key_exists($ip, $parsedSchema[self::VISITORS_INDEX_NAME])) {
            if(array_key_exists($featureName, $parsedSchema[self::VISITORS_INDEX_NAME][$ip])) {
                $parsedSchema[self::VISITORS_INDEX_NAME][$ip][$featureName] += 1;
                return Cache::put(self::VISITOR_ROOT_SCHEMA_NAME, json_encode($parsedSchema));
            }
        }
        $parsedSchema[self::VISITORS_INDEX_NAME][$ip][$featureName] = 1;
        return Cache::put(self::VISITOR_ROOT_SCHEMA_NAME, json_encode($parsedSchema));
    }

    /**
     * @param string $ip
     * @param string $featureName
     *
     * @return mixed
     */
    private function setNewSchemaForVisitors(string $ip, string $featureName)
    {
        $newVisitorsInfoArray = [
            "total_visitors" => 1,
            self::VISITORS_INDEX_NAME => [
                $ip => [
                    $featureName => 1
                ]
            ]
        ];
        return Cache::put(self::VISITOR_ROOT_SCHEMA_NAME, json_encode($newVisitorsInfoArray));
    }

    public function getVisitorInfo()
    {
        if(Cache::has(self::VISITOR_ROOT_SCHEMA_NAME)) {
            $visitorsSchema = json_decode(Cache::get(self::VISITOR_ROOT_SCHEMA_NAME), true);
            $countFormattedArray = [];
            $countFormattedArray[] = [
                'value' => $visitorsSchema['total_visitors'],
                'name' => "Total"
            ];
            foreach (array_column(FeatureEnum::cases(),'value') as $key => $value) {
                $countFormattedArray[] = [
                    'value' => array_sum(array_column($visitorsSchema[self::VISITORS_INDEX_NAME], $value)) ?? 0,
                    'name' => $value,
                ];
            }
            return $countFormattedArray;
        }
        return false;
    }

}
